
@extends('partials.adminPanel')

@section('title', 'Dashboard')

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['line']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Day');
            data.addColumn('number', 'Users');

            data.addRows([
                [new Date(2016, 4, 1),  6],
                [new Date(2016, 4, 2),  4],
                [new Date(2016, 4, 3),  9],
                [new Date(2016, 4, 4),  8],
                [new Date(2016, 4, 5),  10],
                [new Date(2016, 4, 6),   3],
                [new Date(2016, 4, 7),   6],
                [new Date(2016, 4, 8),  3],
                [new Date(2016, 4, 9),  4],
                [new Date(2016, 4, 10), 11],
                [new Date(2016, 4, 11),  19],
                [new Date(2016, 4, 12),  22],
                [new Date(2016, 4, 13),  16],
                [new Date(2016, 4, 14),  27]
            ]);

            var options = {
                chart: {
                    subtitle: 'Sample Graph Only'
                },
                height: 300,
                legend: {
                    position: 'none'
                },
                series: {
                    0: {axis: 'Users'}
                },
                axes: {
                    y: {
                        Requests: {label: "Users"}
                    }
                }
            };

            var chart = new google.charts.Line(document.getElementById('analyticsSnapshotGraph'));

            chart.draw(data, options);
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card medium dashboardCard hoverable">
                    <div class="card-content">
                        <span class="card-title grey-text text-darken-4">Upcoming Events</span>
                        <div class="giantText text-center center-align">{{ $eventCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card medium dashboardCard hoverable">
                    <div class="card-content">
                        <span class="card-title grey-text text-darken-4">API Users</span>
                        <div id="analyticsSnapshotGraph"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
