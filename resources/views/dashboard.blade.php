<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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
                    <td>{{$post->name}}</td>
                    <td>{{$post->email}}</td>
                    <td>{{$post->amount}}</td>
                    <td style="max-width: 400px">{{$post->message}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>
            {{$posts->links()}}
        </div>
    </div>

</body>

</html>