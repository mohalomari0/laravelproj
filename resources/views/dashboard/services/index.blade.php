@extends("dashboard.masterpage")

@section("content")
<div class="container">
    <h1 class="text-center">Service Management</h1>
    <a href="{{ route('services.create') }}" class="btn btn-success mb-3">Add a New Service</a>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->duration }}</td>
                    <td>
                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
