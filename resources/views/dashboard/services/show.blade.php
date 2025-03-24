@ @extends("dashboard.masterpage")

@section('content')

<div class="container">
        <h1 class="text-center">Service Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $service->name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $service->description }}</p>
                <p class="card-text"><strong>Price:</strong> {{ $service->price }}</p>
                <p class="card-text"><strong>Duration:</strong> {{ $service->duration }} minutes</p>
                <a href="{{ route('services.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>

@endsection
    