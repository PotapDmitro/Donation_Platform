@extends ('layouts.main')
@section('content')
<form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="Name">
    </div>

    <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <label for="Amount" class="form-label">Amount</label>
        <input name="amount" class="form-control" id="Amount">
    </div>

    <div class="mb-3">
        <label for="Message" class="form-label">Message</label>
        <textarea class="form-control" name="message" id="Message"></textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Add Donate</button>
    </div>

    <div style="padding-top: 20px;">
        <a href="{{route('dashboard')}}" class="btn btn-primary">Back</a>
    </div>
</form>
@endsection
