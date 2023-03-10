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
    <a href="{{route('post.create')}}" class="btn btn-primary">Add one</a>
</div>

@endsection