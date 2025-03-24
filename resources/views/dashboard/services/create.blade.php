

@extends("dashboard.masterpage")

@section('content')
    <div class="container">
        <h1 class="text-center">Add a New Service</h1>
        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name of Service:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (minutes):</label>
                <input type="number" name="duration" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
    

@endsection
