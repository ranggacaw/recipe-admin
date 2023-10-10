@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Edit User</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <form action="{{ url('user-edit-store') }}/{{$user->id}}" method="post">
                    @csrf
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </td>
                            <td>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-label-success waves-effect">Save</button>
                            </td>
                        </tr>
                    </tbody>
                </form>
            </table>
        </div>
    </div>
@endsection