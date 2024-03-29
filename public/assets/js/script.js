$(document).ready(function () {
    // Disable alamat domisili if domisili ktp is checked and copy value from alamat ktp to alamat domisili if checked check realtime

    $("#domis_ktp").change(function () {
        if (this.checked) {
            // Copy value from alamat ktp to alamat domisili
            $("#alamatDomisili").val($("#alamatKTP").val());
            $("#alamatDomisili").prop("disabled", true);
        } else {
            $("#alamatDomisili").prop("disabled", false);
        }
    });
});
