@extends('dashboard.masterpage')

@section('content')
<div>
    <h1>Appointments</h1>
    <a href="{{ route('appointments.create') }}" class="btn btn-success">Add New Appointment</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Service ID</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->user_id }}</td>
                    <td>{{ $appointment->service_id }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection