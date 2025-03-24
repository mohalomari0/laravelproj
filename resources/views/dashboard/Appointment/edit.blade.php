@extends("dashboard.masterpage")

@section('content')
    <h1>Edit Appointment</h1>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>User ID:</label>
            <input type="text" name="user_id" value="{{ $appointment->user_id }}" required>
        </div>
        <div>
            <label>Service ID:</label>
            <input type="text" name="service_id" value="{{ $appointment->service_id }}" required>
        </div>
        <div>
            <label>Appointment Date:</label>
            <input type="date" name="appointment_date" value="{{ $appointment->appointment_date }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Confirmed">Confirmed</option>
                <option value="In Progress">In Progress</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection