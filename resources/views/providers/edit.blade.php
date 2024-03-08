@extends('layouts.app')

@section('content')
    <h1>Edit Provider</h1>

    <form action="{{ route('providers.update', $provider->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="pname">Name:</label>
            <input type="text" name="pname" class="form-control" id="pname" value="{{ $provider->pname }}" required>
        </div>

        <div class="form-group">
            <label for="pnum">Pin Number:</label>
            <input type="number" name="pnum" class="form-control" id="pnum" value="{{ $provider->pnum }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Provider</button>
    </form>
@endsection
