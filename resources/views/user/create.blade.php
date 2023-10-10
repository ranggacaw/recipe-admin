@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Create New User</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ url('user-create-store') }}" method="post">
                    @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-label-success waves-effect">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection