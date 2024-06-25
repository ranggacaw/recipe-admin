@extends('layouts.app')

@section('content')
    <form action="{{ url('about-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Current -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Current</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            {{-- <input type="text" class="form-control" name="title" value="{{ $abouts->title }}" disabled /> --}}
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Content</label>
                            {{-- <textarea class="form-control" name="content" rows="4"disabled>{{ $abouts->content }}</textarea> --}}
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Service Title</label>
                            {{-- <input type="text" class="form-control" name="service_title" value="{{ $abouts->service_title }}" disabled /> --}}
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Service Content</label>
                            {{-- <textarea class="form-control" name="service_content" rows="4" disabled>{{ $abouts->service_content }}</textarea> --}}
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Brands</label>
                            <input class="form-control" type="file" id="formFile" name="brand" />
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Current -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Current</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="title" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Content</label>
                            <textarea class="form-control" name="content" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Service Title</label>
                            <input type="text" class="form-control" placeholder="service title" name="service_title" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">Service Content</label>
                            <input type="text" class="form-control" placeholder="service title" name="service_content" />
                        </div>
                        {{-- <div class="mb-5">
                            <label for="" class="form-label">Brands</label>
                            <input class="form-control" type="file" id="formFile" name="brand" />
                        </div> --}}
                        <div class="">
                            <button type="submit" class="btn btn-label-success waves-effect">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection