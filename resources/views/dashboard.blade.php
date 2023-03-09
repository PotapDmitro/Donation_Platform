@extends ('layouts.main')
@section ('content')

<div class="table__container" style="margin: 300px; max-width: 1080px">
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
            @foreach($posts as $post)
            <tr>
                <td>{{$post->Name}}</td>
                <td>{{$post->Email}}</td>
                <td>{{$post->Amount}}</td>
                <td style="max-width: 400px">{{$post->Message}}</td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div>
        {{$posts->links()}}
    </div>
</div>

@endsection