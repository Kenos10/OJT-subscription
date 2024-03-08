@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 mt-4">
        <a class="navbar-brand" href="#">Subscribers</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addSubscriberModal">
                    Add Subscriber
                </button>
            </li>
            <li class="nav-item">
                <a href="{{ route('providers.index') }}"  class="nav-link">Provider</a>
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Provider Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriber as $subscriber)
            <tr>
                <td>{{ $subscriber->fname }}</td>
                <td>{{ $subscriber->lname }}</td>
                <td>
                    @if ($subscriber->provider)
                        {{ $subscriber->provider->pname }}
                    @else
                        No Provider
                    @endif
                </td>
                <td>
                    <a href="{{ route('subscribers.edit', $subscriber->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('subscribers.destroy', $subscriber->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subscriber?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="addSubscriberModal" tabindex="-1" role="dialog" aria-labelledby="addSubscriberModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubscriberModalLabel">Add Subscriber</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subscribers.store') }}" method="post" class="">
                        @csrf
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" name="fname" id="fname" required>
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" name="lname" id="lname" required>
                        </div>

                        <div class="form-group">
                            <label for="pid">Provider:</label>
                            <select name="pid" id="" class="form-control">
                                <option disabled selected>-- Select Provider --</option>
                                @foreach ($provider as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->pname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Subscriber</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

