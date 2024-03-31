<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Session;
use Closure;
use Illuminate\Contracts\Auth\Guard;

# Call Models
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('auth/login');
                // return redirect()->guest('/');
            }
        }

        return $next($request);
    }

    /**
     * After login, redirect to the user's profile page
     *
     * @return string
     */
    public function login(Request $request)
    {
        $checkToken = $request->input('_token');
        if($checkToken != csrf_token()){
            return redirect()->route('login')->withInput()->with('error', 'Token is invalid');
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'user' => 'required',
            'password' => 'required|min:8',
        ], [
            'user.required' => 'Username or Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return redirect()->route('login');
        }
        
        
        try{
            // login with email or username
            $login = request()->input('user');
            $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
            if (Auth::attempt(array($field => $input['user'], 'password' => $input['password'])))
            {   
                $getIP = $request->ip();
                $realIpAddress = $request->getClientIp();
                $userAgent = $request->userAgent();
                // $user = Auth::user();
                // $user->last_login = now();
                // $user->last_ip = $realIpAddress;
                // $user->last_user_agent = $userAgent;
                // $user->save();
                $formatLog = [
                    'ip_address' => $realIpAddress,
                    'user_agent' => $userAgent,
                    'login_at' => now(),
                ];
                \Log::info('User Login : user_id:'.Auth::user()->id, $formatLog);
                return redirect()->route('resepsionis.index')->with('success', 'Login Successfully');
            }
            else{
                Auth::logout();
                return redirect()->route('login')->with('error', 'username or password is incorrect');
            }
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            \Log::error('Error Login', ['error' => $e->getMessage()]);
            return redirect()->route('login');
        }
    }

    /**
     * After logout, redirect to the login page
     *
     * @return string
     */
    public function logout(Request $request)
    {
        try {
            $getIP = $request->ip();
            $realIpAddress = $request->getClientIp();
            $userAgent = $request->userAgent();
            $formatLog = [
                'ip_address' => $realIpAddress,
                'user_agent' => $userAgent,
                'logout_at' => now(),
            ];
            \Log::info('User Logout : user_id:'.Auth::user()->id, $formatLog);
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logout Successfully');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            \Log::error('Error Logout', ['error' => $e->getMessage()]);
            return redirect()->route('login');
        }
    }

    /**
     * After logout, redirect to the login page
     *
     * @return string
     */
    public function showLoginForm(){
        return view('auth.login');
    }
}
