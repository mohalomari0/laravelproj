@extends("dashboard.masterpage")

@section('content')
    <h1>Appointment Details</h1>
    <p>ID: {{ $appointment->id }}</p>
    <p>User ID: {{ $appointment->user_id }}</p>
    <p>Service ID: {{ $appointment->service_id }}</p>
    <p>Appointment Date: {{ $appointment->appointment_date }}</p>
    <p>Status: {{ $appointment->status }}</p>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
@endsection