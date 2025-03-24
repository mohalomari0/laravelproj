@extends("dashboard.masterpage")

@section('content')
<div class="container">
    <h1 class="my-4">Add New Appointment</h1>
    <form action="{{ route('appointments.store') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf
        <!-- User ID Field -->
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID:</label>
            <input type="text" name="user_id" id="user_id" class="form-control" required>
        </div>

        <!-- Service ID Field -->
        <div class="mb-3">
            <label for="service_id" class="form-label">Service ID:</label>
            <input type="text" name="service_id" id="service_id" class="form-control" required>
        </div>

        <!-- Appointment Date Field -->
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Appointment Date:</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" required>
        </div>

        <!-- Status Field (Dropdown Selector) -->
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Confirmed">Confirmed</option>
                <option value="In Progress">In Progress</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection