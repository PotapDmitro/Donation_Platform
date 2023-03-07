<table class="table">
    <thead>
        <tr>
            <th scope="col">Donator Name</th>
            <th scope="col">Email</th>
            <th scope="col">Amount</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->Name}}</td>
            <td>{{$post->Email}}</td>
            <td>{{$post->Amount}}</td>
            <td>{{$post->Message}}</td>
            <td>{{$post->created_at->format('Y-m-d')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>