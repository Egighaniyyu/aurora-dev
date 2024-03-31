// chart kunjungan pasien
var currentMode = "bulanan";

var options_kunjungan = {
    series: [],
    colors: ["#0EB0F1", "#FE8947", "#FED575"],
    chart: {
        height: 350,
        type: "area",
        zoom: {
            enabled: false,
        },
        toolbar: {
            show: true,
            offsetX: 0,
            offsetY: 0,
            tools: {
                download: true,
            },
            export: {
                csv: {
                    // Kunjungan Pasien - Chart - 31 Dec 2021.csv
                    filename:
                        "Kunjungan Pasien - Chart - " +
                        new Date().toDateString(),

                    columnDelimiter: ",",
                    headerCategory: "category",
                    headerValue: "value",
                    dateFormatter(timestamp) {
                        return new Date(timestamp).toDateString();
                    },
                },
                svg: {
                    filename:
                        "Kunjungan Pasien - Chart - " +
                        new Date().toDateString(),
                },
                png: {
                    filename:
                        "Kunjungan Pasien - Chart - " +
                        new Date().toDateString(),
                },
            },
            autoSelected: "zoom",
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "smooth",
    },
    xaxis: {
        type: "category",
        labels: {
            datetimeUTC: false,
        },
        tickPlacement: "on",
    },
    yaxis: {
        title: { text: "Jumlah Pasien" },
    },
    timezone: "Asia/Jakarta",
    tooltip: {
        x: {
            format: "dd MMM yyyy",
        },
    },
    legend: {
        position: "top",
        horizontalAlign: "left",
    },
    responsive: [
        {
            breakpoint: 1000,
            options: {
                chart: {
                    height: 300,
                },
            },
        },
        {
            breakpoint: 600,
            options: {
                chart: {
                    height: 250,
                },
            },
        },
    ],
};

var chart_kunjungan = new ApexCharts(
    document.querySelector("#chart_kunjungan"),
    options_kunjungan
);
chart_kunjungan.render();

function fetchChartData(mode) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            var data = {
                categories: [],
                series: [],
            };

            if (mode === "bulanan") {
                var monthDataUmum =
                    document.getElementById("monthDataUmum").value;
                var monthDataBPJS =
                    document.getElementById("monthDataBpjs").value;
                var monthDataRujukan =
                    document.getElementById("monthDataRujukan").value;
                var monthDate = document.getElementById("monthDate").value;
                data.categories = JSON.parse(monthDate);
                data.series = [
                    {
                        name: "Umum",
                        data: JSON.parse(monthDataUmum),
                    },
                    {
                        name: "BPJS",
                        data: JSON.parse(monthDataBPJS),
                    },
                    {
                        name: "Rujukan",
                        data: JSON.parse(monthDataRujukan),
                    },
                ];
            } else if (mode === "mingguan") {
                var weekDataUmum =
                    document.getElementById("weekDataUmum").value;
                var weekDataBPJS =
                    document.getElementById("weekDataBpjs").value;
                var weekDataRujukan =
                    document.getElementById("weekDataRujukan").value;
                var weekDate = document.getElementById("weekDate").value;
                data.categories = JSON.parse(weekDate);
                data.series = [
                    {
                        name: "Umum",
                        data: JSON.parse(weekDataUmum),
                    },
                    {
                        name: "BPJS",
                        data: JSON.parse(weekDataBPJS),
                    },
                    {
                        name: "Rujukan",
                        data: JSON.parse(weekDataRujukan),
                    },
                ];
            } else if (mode === "harian") {
                var dayDataUmum = document.getElementById("dayDataUmum").value;
                var dayDataBPJS = document.getElementById("dayDataBpjs").value;
                var dayDataRujukan =
                    document.getElementById("dayDataRujukan").value;
                var dayDate = document.getElementById("dayDate").value;
                console.log(dayDate);
                data.categories = JSON.parse(dayDate);
                data.series = [
                    {
                        name: "Umum",
                        data: JSON.parse(dayDataUmum),
                    },
                    {
                        name: "BPJS",
                        data: JSON.parse(dayDataBPJS),
                    },
                    {
                        name: "Rujukan",
                        data: JSON.parse(dayDataRujukan),
                    },
                ];
            }

            resolve(data);
        }, 1000); // Simulate a 1-second delay
    });
}

function updateChart(mode) {
    currentMode = mode; // Set current mode
    fetchChartData(mode)
        .then((chartData) => {
            options_kunjungan.xaxis.categories = chartData.categories;
            options_kunjungan.series = chartData.series;

            chart_kunjungan.updateOptions(options_kunjungan, true); // Set true for animation
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
}

document.getElementById("bulanan").addEventListener("click", function () {
    document.getElementById("dropdownDefaultButton").innerHTML =
        "Bulanan <svg class='w-2.5 h-2.5 ms-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 10 6'><path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 4 4 4-4' /></svg>";
    updateChart("bulanan");
});

document.getElementById("mingguan").addEventListener("click", function () {
    document.getElementById("dropdownDefaultButton").innerHTML =
        'Mingguan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" /></svg>';
    updateChart("mingguan");
});

document.getElementById("harian").addEventListener("click", function () {
    document.getElementById("dropdownDefaultButton").innerHTML =
        'Harian <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" /></svg>';
    updateChart("harian");
});

// Initial chart render
updateChart(currentMode);
// end chart kunjungan pasien

// chart jenis pasien
var jenis_pasien = document.getElementById("jenisPasien").value;
var options_jenis_pasien = {
    series: JSON.parse(jenis_pasien),
    labels: ["Umum", "BPJS", "Rujukan"],
    colors: ["#0EB0F1", "#FE8947", "#FED575"],
    chart: {
        height: 300,
        type: "donut",
    },
    plotOptions: {
        pie: {
            startAngle: -90,
            endAngle: 270,
            donut: {
                size: "50%",
            },
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        type: "gradient",
    },
    legend: {
        position: "bottom",
        horizontalAlign: "center",
    },
    responsive: [
        {
            breakpoint: 480,
            options: {
                chart: {
                    // width: 200
                },
                legend: {
                    position: "bottom",
                },
            },
        },
    ],
};

var chart_jenis_pasien = new ApexCharts(
    document.querySelector("#chart_jenis_pasien"),
    options_jenis_pasien
);
chart_jenis_pasien.render();
// end chart jenis pasien

// chart icd
var options_icd = {
    series: [
        {
            data: [400, 430, 448, 470, 540],
        },
    ],
    colors: ["#0EB0F1"],
    chart: {
        type: "bar",
        height: 350,
    },
    plotOptions: {
        bar: {
            borderRadius: 4,
            horizontal: true,
        },
    },
    dataLabels: {
        enabled: false,
    },
    xaxis: {
        categories: ["Z00", "J00", "A28", "X00", "F00"],
    },
};

var chart_icd = new ApexCharts(
    document.querySelector("#chart_icd"),
    options_icd
);
chart_icd.render();
// end chart icd
