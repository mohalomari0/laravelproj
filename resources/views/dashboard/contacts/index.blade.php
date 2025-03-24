

@extends('dashboard.masterpage')

@section('content')
<div class="container mt-4">
    <h1>Contact Us Messages</h1>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>

        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td><h2>message</h2><br>{{ $contact->message }}<br><h2>Reply</h2><br>{{$contact->reply}}</td>
            <td>
                <div class="d-flex justify-content-start">
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-secondary">Replay</button>
                </form>
            </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>


@endsection
