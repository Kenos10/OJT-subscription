@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 mt-4">
        <a class="navbar-brand" href="#">Providers</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addProviderModal">
                        Add Provider
                    </button>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscribers.index') }}" class="nav-link">Subscribers</a>
                </li>
            </ul>
        </div>
    </nav>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Pin Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($provider as $provider)
                <tr>
                    <td>{{ $provider->pname }}</td>
                    <td>{{ $provider->pnum }}</td>
                    <td>
                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('providers.destroy', $provider->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this provider?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="addProviderModal" tabindex="-1" role="dialog" aria-labelledby="addProviderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProviderLabel">Add Provider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('providers.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="pname">Name:</label>
                            <input type="text" class="form-control" name="pname" id="pname" required>
                        </div>

                        <div class="form-group">
                            <label for="pnum">Pin Number:</label>
                            <input type="number" class="form-control" name="pnum" id="pnum" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Provider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
