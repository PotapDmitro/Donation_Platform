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
                <td>{{ $post->Name }}</td>
                <td>{{ $post->Email }}</td>
                <td>{{ $post->Amount }}</td>
                <td style="max-width: 400px">{{ $post->Message }}</td>
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


<script src="https://code.highcharts.com/highcharts.js"></script>

<div id="container"></div>

<script>
    var amountDate = <?php echo json_encode($amountDate) ?>;
    Highcharts.chart('container', {
        title: {
            text: "Donation statistics"
        },
        xAxis: {
            categories: ['january', 'february', 'march']
        },
        yAxis: {
            title: "Amount"
        },
        series: [{
            name: "Amount",
            data: amountDate
        }],
    });
</script>









@endsection