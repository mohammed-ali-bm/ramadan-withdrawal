
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&family=Noto+Kufi+Arabic:wght@200;500&family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/custom.css?version=1.0.0' . rand(1,999999)) }}">
<link rel="stylesheet" href="{{ asset('assets/css/rtl.css?version=1.0.0' . rand(1,999999)) }}">
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


        @vite(['resources/css/app.css','resources/js/app.js'])

     
        @spladeHead
    </head>
    <body class=" antialiased">
        @include('components.tooltips')
        @splade
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
        
        <script   src="{{ asset('assets/js/script.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

         
        <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
              const options = {
                    colors: ["#491976", "#9754d6"],
                    series: [
                      {
                        name: "طلب",
                        color: "#491976",
                        data: [
                          { x: "Mon", y: 231 },
                          { x: "Tue", y: 122 },
                          { x: "Wed", y: 63 },
                          { x: "Thu", y: 421 },
                          { x: "Fri", y: 122 },
                          { x: "Sat", y: 323 },
                          { x: "Sun", y: 111 },
                        ],
                      },
                      {
                        name: "متجر مسجل",
                        color: "#9754d6",
                        data: [
                          { x: "Mon", y: 232 },
                          { x: "Tue", y: 113 },
                          { x: "Wed", y: 341 },
                          { x: "Thu", y: 224 },
                          { x: "Fri", y: 522 },
                          { x: "Sat", y: 411 },
                          { x: "Sun", y: 243 },
                        ],
                      },
                    ],
                    chart: {
                      type: "bar",
                      height: "320px",
                      fontFamily: "Inter, sans-serif",
                      toolbar: {
                        show: false,
                      },
                    },
                    plotOptions: {
                      bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                      },
                    },
                    tooltip: {
                      shared: true,
                      intersect: false,
                      style: {
                        fontFamily: "Inter, sans-serif",
                      },
                    },
                    states: {
                      hover: {
                        filter: {
                          type: "darken",
                          value: 1,
                        },
                      },
                    },
                    stroke: {
                      show: true,
                      width: 0,
                      colors: ["transparent"],
                    },
                    grid: {
                      show: false,
                      strokeDashArray: 4,
                      padding: {
                        left: 2,
                        right: 2,
                        top: -14
                      },
                    },
                    dataLabels: {
                      enabled: false,
                    },
                    legend: {
                      show: false,
                    },
                    xaxis: {
                      floating: false,
                      labels: {
                        show: true,
                        style: {
                          fontFamily: "Inter, sans-serif",
                          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
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
                    fill: {
                      opacity: 1,
                    },
                  }
          
                  if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("column-chart"), options);
                    chart.render();
                  }
          
                  if(document.getElementById("column-chart2") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("column-chart2"), options);
                    chart.render();
                  }
          
                  if(document.getElementById("column-chart3") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("column-chart3"), options);
                    chart.render();
                  }
            });
          </script>
    


    </body>
</html>
