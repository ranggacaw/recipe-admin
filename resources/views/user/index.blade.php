@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">List Users</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                        $no = 1;
                    ?>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at->format('m/d/Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('user-edit') }}/{{$item->id}}"><i class="ti ti-pencil me-1"></i> Edit</a>
                                        
                                        @if (auth()->user()->id != $item->id && $item->role_id != 1)
                                            <form action="{{ url('user') }}/{{ $item->id}}" method="post" style="display: contents;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection