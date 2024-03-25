$(document).ready(function () {
    $("#provinsi").change(function () {
        var provinsiID = $(this).val();
        if (provinsiID) {
            $.ajax({
                type: "GET",
                url:
                    "{{ route('data-pasien.cities') }}?provinsi_id=" +
                    provinsiID,
                success: function (res) {
                    if (res) {
                        $("#kota_kab").empty();
                        $("#kota_kab").append(
                            "<option selected disabled>Pilih Kota / Kabupaten</option>"
                        );
                        $.each(res, function (id, value) {
                            $("#kota_kab").append(
                                '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#kota_kab").empty();
                    }
                },
            });
        } else {
            $("#kota_kab").empty();
        }
    });
});

$(document).ready(function () {
    $("#kota_kab").change(function () {
        var kotaKabID = $(this).val();
        if (kotaKabID) {
            $.ajax({
                type: "GET",
                url:
                    "{{ route('data-pasien.districts') }}?kota_kab_id=" +
                    kotaKabID,
                success: function (res) {
                    if (res) {
                        $("#Kecamatan").empty();
                        $("#Kecamatan").append(
                            "<option>Pilih Kecamatan</option>"
                        );
                        $.each(res, function (key, value) {
                            $("#Kecamatan").append(
                                '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#Kecamatan").empty();
                    }
                },
            });
        } else {
            $("#Kecamatan").empty();
        }
    });
});

$(document).ready(function () {
    $("#Kecamatan").change(function () {
        var kecamatanID = $(this).val();
        if (kecamatanID) {
            $.ajax({
                type: "GET",
                url:
                    "{{ route('data-pasien.villages') }}?kecamatan_id=" +
                    kecamatanID,
                success: function (res) {
                    if (res) {
                        $("#desa_kel").empty();
                        $("#desa_kel").append(
                            "<option>Pilih Kelurahan / Desa</option>"
                        );
                        $.each(res, function (key, value) {
                            $("#desa_kel").append(
                                '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#desa_kel").empty();
                    }
                },
            });
        } else {
            $("#desa_kel").empty();
        }
    });
});
