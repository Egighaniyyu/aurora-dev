<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('assets/img/logo.svg') }}" type="image/x-icon">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <script src="https://unpkg.com/feather-icons"></script>

    {{-- tailwind css --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- my css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- my js --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    {{-- css script --}}
    @stack('page-css')
    {{-- end css script --}}

</head>

<body onload="init()">

    {{-- navbar --}}
    @include('partials.navbar')
    {{-- end navbar --}}

    {{-- sidebar --}}
    @include('partials.sidebar')
    {{-- end sidebar --}}

    {{-- body --}}
    @yield('content')
    {{-- end body --}}

    {{-- js script --}}
    @stack('page-scripts')
    {{-- end js script --}}

    <script>
        feather.replace();
    </script>

    <script>
        function init() {
            const inputs = [{
                    id: "nik",
                    maxLength: 16,
                    warning: "nik-warning",
                    count: "nik-CountWarning"
                },
                {
                    id: "no_bpjs",
                    maxLength: 13,
                    warning: "bpjs-warning",
                    count: "bpjs-countWarning"
                },
                {
                    id: "nikPenanggungJawab",
                    maxLength: 16,
                    warning: "nikPenanggungJawab-warning",
                    count: "nikPenanggungJawab-countWarning"
                },
            ];

            inputs.forEach(function(input) {
                const element = document.getElementById(input.id);
                const warning = document.getElementById(input.warning);
                const count = document.getElementById(input.count);
                const buttonSubmit = document.getElementById("submit");

                element.addEventListener("input", function() {
                    const currentLength = element.value.length;
                    const remaining = input.maxLength - currentLength;

                    warning.textContent = currentLength > input.maxLength ?
                        `Lebih ${remaining} karakter` :
                        currentLength < input.maxLength ?
                        `Kurang ${remaining} karakter` :
                        "";
                    warning.style.display = currentLength !== input.maxLength ? "block" : "none";
                    count.textContent = `${currentLength}/${input.maxLength}`;
                    buttonSubmit.disabled = currentLength !== input.maxLength;
                });
            });
        }

        window.onload = init;
    </script>

</body>

</html>
