@extends ('layouts.main')
@section('content')
<div>
    <table class="table">
        <thead>
            <tr style="width: auto">
                <th scope="col">Donator Name</th>
                <th scope="col">Email</th>
                <th scope="col">Amount</th>
                <th scope="col" style="max-width: 400px">Message</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->name }}</td>
                <td>{{ $post->email }}</td>
                <td>{{ $post->amount }}</td>
                <td style="max-width: 400px">{{ $post->message }}</td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div>
        {{ $posts->links() }}
    </div>
</div>
@endsection

@section('button-create')
<div style="float: right;">
    <a href="{{ route('post.create') }}" class="btn btn-primary">Add one</a>
</div>
@endsection


@section ('HighCharts')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart"></div>

<script>
    var amountDate = <?php echo json_encode($chartData) ?>;

    google.charts.load('current', {
        packages: ['corechart', 'line']
    });

    var ress = [];
    for (let [key, value] of Object.entries(amountDate)) {
        ress.push([`${key}`, Number(`${value}`)]);
    }

    google.charts.setOnLoadCallback(drawBackgroundColor);

    function drawBackgroundColor() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Amount');
        data.addRows(ress);

        var options = {
            hAxis: {
                title: 'Date'
            },
            vAxis: {
                title: 'Amount'
            },
            backgroundColor: '#ffffff'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart'));
        chart.draw(data, options);
    }
</script>

@endsection


@section('widget')
<div class="conteiner" style="display: flex; justify-content: space-between;">
    <x-widget info="Top Donator" amount="{{$maxAmount}}" name="{{$resultName}}"></x-widget>
    <x-widget info="Last Month Amount" amount="{{$resultSumMonth}}"></x-widget>
    <x-widget info="All time amounth" amount="{{$resultSum}}"></x-widget>
</div>
@endsection
