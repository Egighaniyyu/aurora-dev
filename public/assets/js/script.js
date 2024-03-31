$(document).ready(function () {
    // Disable alamat domisili if domisili ktp is checked and copy value from alamat ktp to alamat domisili if checked check realtime

    $("#domis_ktp").change(function () {
        if (this.checked) {
            // Copy value from alamat ktp to alamat domisili
            $("#alamatDomisili").val("Sama dengan alamat KTP");
            $("#alamatDomisili").prop("disabled", true);
        } else {
            $("#alamatDomisili").prop("disabled", false);
        }
    });
});

// search data pasien resepsionis
// $(document).ready(function () {
//     $("#keyword").on("keyup", function () {
//         var keyword = $(this).val();

//         // Dapatkan token CSRF dari meta tag
//         var _token = $('input[name="_token"]').val();
//         // Kirimkan request ajax ke route /search/ajax
//         $.ajax({
//             url: "/customer/search",
//             method: "POST",
//             data: {
//                 _token: _token,
//                 keyword: keyword,
//             },
//             success: function (response) {
//                 // Kosongkan dropdown
//                 $("#results").empty();

//                 // Jika data ditemukan
//                 if (response.results.length > 0) {
//                     // Tampilkan dropdown
//                     $("#results").show();
//                     $("#no-results").hide();

//                     // Iterasi hasil pencarian
//                     $.each(response.results, function (index, result) {
//                         // Buat element option
//                         var option = $("<li>").text(result.name);

//                         // Tambahkan event click pada option
//                         option.on("click", function () {
//                             // Lakukan aksi ketika option dipilih
//                             // Contoh: isikan input keyword dengan nama yang dipilih
//                             $("#keyword").val(result.name);

//                             // Sembunyikan dropdown
//                             $("#results").hide();
//                         });

//                         // Tambahkan option ke dropdown
//                         $("#results").append(option);
//                     });
//                 } else {
//                     // Sembunyikan dropdown
//                     $("#results").hide();
//                     $("#no-results").show();
//                 }
//             },
//         });
//     });
//     // Sembunyikan dropdown saat klik di luar area search box
//     $(document).click(function (event) {
//         if (!$(event.target).closest(".search-box").length) {
//             $("#results").hide();
//             $("#no-results").hide();

//             // Kosongkan keyword
//             // jika searchbox diatas 5 huruf maka tidak di kosongkan
//             if ($("#keyword").val().length <= 15) {
//                 $("#keyword").val("");
//             }
//         }
//     });
// });

// Start Check max character
function init() {
    const inputs = [
        {
            id: "nik",
            maxLength: 16,
            warning: "nik-warning",
            count: "nik-CountWarning",
        },
        {
            id: "no_bpjs",
            maxLength: 13,
            warning: "bpjs-warning",
            count: "bpjs-countWarning",
        },
        {
            id: "nikPenanggungJawab",
            maxLength: 16,
            warning: "nikPenanggungJawab-warning",
            count: "nikPenanggungJawab-countWarning",
        },
    ];

    inputs.forEach(function (input) {
        const element = document.getElementById(input.id);
        const warning = document.getElementById(input.warning);
        const count = document.getElementById(input.count);
        const buttonSubmit = document.getElementById("submit");

        if (element !== null) {
            element.addEventListener("input", function () {
                const currentLength = element.value.length;
                const remaining = input.maxLength - currentLength;

                // change border color to red if below or above maxLength
                element.style.borderColor =
                    currentLength > input.maxLength
                        ? "red"
                        : currentLength < input.maxLength
                        ? "red"
                        : "";
                warning.textContent =
                    currentLength > input.maxLength
                        ? `Lebih ${remaining} karakter`
                        : currentLength < input.maxLength
                        ? `Kurang ${remaining} karakter`
                        : "";
                warning.style.display =
                    currentLength !== input.maxLength ? "block" : "none";
                count.textContent = `${currentLength}/${input.maxLength}`;
                buttonSubmit.disabled = currentLength !== input.maxLength;
            });
        }
    });
}

window.onload = init;
// {{-- End Check max character --}}
