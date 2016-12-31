$(function () {
    'use strict';

    var expensesChartCanvas = $("#expensesChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var expensesChart = new Chart(expensesChartCanvas);

    var year = 2016;

    $("#next").click(function () {
        year++;
        getReportData();
        console.info('next'+year);
    });

    $("#prior").click(function () {
        year--;
        getReportData();
        console.info('prior'+year);
    });

    var getReportData = function () {
        $.getJSON('/report/data/' + year, function (data) {
            var expensesChartData = {
                labels: data.labels,
                datasets: [
                    {
                        label: "In",
                        fillColor: "rgb(0, 166, 90)",
                        strokeColor: "rgb(0, 166, 90)",
                        pointColor: "rgb(0, 100, 90)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgb(220,220,220)",
                        data: data.in
                    },
                    {
                        label: "Out",
                        fillColor: "#dd4b39",
                        strokeColor: "#dd4b39",
                        pointColor: "#F00",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: data.out
                    }
                ]
            };

            var expensesChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: true,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - Whether the line is curved between points
                bezierCurve: true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension: 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot: true,
                //Number - Radius of each point dot in pixels
                pointDotRadius: 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth: 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius: 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke: true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth: 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill: false,
                //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true
            };

            //Create the line chart
            expensesChart.Line(expensesChartData, expensesChartOptions);
        });
    };

    getReportData();
});