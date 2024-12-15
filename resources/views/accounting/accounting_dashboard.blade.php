<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-welcome />

            </div>
        </div>
    </div>
</x-app-layout>

<script>

    const options = {
    chart: {
        height: "100%",
        maxWidth: "100%",
        type: "area",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
        enabled: false,
        },
        toolbar: {
        show: false,
        },
    },
    tooltip: {
        enabled: true,
        x: {
        show: false,
        },
    },
    fill: {
        type: "gradient",
        gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: "#1C64F2",
        gradientToColors: ["#1C64F2"],
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        width: 6,
    },
    grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
        left: 2,
        right: 2,
        top: 0
        },
    },
    series: [
        {
        name: "New users",
        data: [6500, 6418, 6456, 6526, 6356, 6456],
        color: "#1A56DB",
        },
    ],
    xaxis: {
        categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
        labels: {
        show: false,
        },
        axisBorder: {
        show: false,
        },
        axisTicks: {
        show: false,
        },
    },
    yaxis: {
        show: false,
    },
    }

    if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("area-chart"), options);
    chart.render();
    }

</script>


