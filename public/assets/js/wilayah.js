$(document).ready(function () {
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
