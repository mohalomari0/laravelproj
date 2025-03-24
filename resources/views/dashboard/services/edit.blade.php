@extends("dashboard.masterpage")


@section("content")
    <div class="container">
        <h1 class="text-center">Modify the Service</h1>
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name of Service:</label>
                <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" class="form-control" value="{{ $service->price }}" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (minutes):</label>
                <input type="number" name="duration" class="form-control" value="{{ $service->duration }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection