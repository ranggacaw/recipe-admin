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
                        <th>Category</th>
                        <th>Ingredients</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php 
                        $no = 1;
                    ?>
                    @if (!empty($recipes))
                        @foreach ($recipes as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                @if ($item->category == 2)
                                    <td>Ice</td>
                                @else
                                    <td>Hot</td>
                                @endif
                                    
                                <td style="display: block; overflow: hidden;">{!! $item->ingredient !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('recipe-edit') }}/{{$item->id}}"><i class="ti ti-pencil me-1"></i> Edit</a>
                                            <form action="{{ url('recipe') }}/{{ $item->id}}" method="post" style="display: contents;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        td > p {
            margin-bottom: 0px;
        }
    </style>
@endpush