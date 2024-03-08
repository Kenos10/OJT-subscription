@extends('layouts.app')

@section('content')
    <h1>Edit Subscriber</h1>

    <form action="{{ route('subscribers.update', $subscriber->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" name="fname"  class="form-control" id="fname" value="{{ $subscriber->fname }}" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" name="lname"  class="form-control" id="lname" value="{{ $subscriber->lname }}" required>
        </div>

        <div class="form-group">
            <select name="pid" id="" class="form-control">
                <option disabled>-- Select Provider --</option>
                @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}" {{ $subscriber->pid == $provider->id ? 'selected' : '' }}>{{ $provider->pname }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Subscriber</button>
    </form>
@endsection
