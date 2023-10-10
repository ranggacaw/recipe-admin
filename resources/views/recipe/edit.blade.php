@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card h-100">
            <h5 class="card-header">Edit Recipe</h5>
            <div class="card-body">
                <label class="fw-bold" for="">Recipe Name :</label>
                <p class="mb-3">{{$recipe->name}}</p>

                <label class="fw-bold" for="">Ingridient :</label>
                <p class="mb-3 px-3 ">{!!$ingredients!!}</p>

                <label class="fw-bold" for="">Category :</label>
                <p class="mb-3">
                    @if ($recipe->category != 2)
                        Hot Food/Beverage
                    @else
                        Ice Food/Beverage
                    @endif
                </p>
                
                <label class="fw-bold" for="">Recipe Photo :</label>
                <p class="mb-3">
                    <img src="{{asset('img/recipe')}}/{{$recipe->image}}" alt="" srcset="">
                </p>
                
                <label class="fw-bold" for="">Recipe Photo Details:</label>
                <p class="mb-3">
                    <img src="{{asset('img/recipe')}}/{{$recipe->imageDetail}}" alt="" srcset="" class="w-100">
                </p>

                <label class="fw-bold" for="">Steps :</label>
                <p class="mb-3">{!! $recipe->content !!}</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <form action="{{ url('recipe-edit-store') }}/{{$recipe->id}}" method="post">
                    @csrf
                    <tbody class="table-border-bottom-0">
                        
                        <div class="mb-3">
                            <label class="form-label">Recipe Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $recipe->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="photoFile" class="form-label">Food / Beverages Photo</label>
                            <input class="form-control" name="image" type="file" id="photoFile">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Recipe Ingredients</label>
                            <small class="text-light fw-medium">(Using ' , ' for Enter)</small>
                            <input type="text" class="form-control" name="ingredient" value="{{ $recipe->ingredient }}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Detail Food / Beverages Photo</label>
                            <small class="text-light fw-medium">(Landscape photo is better)</small>
                            <input class="form-control" name="imageDetail" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categories</label>
                            <div class="col-md">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category" id="1" value="1">
                                    <label class="form-check-label" for="1">Hot Food/Beverage</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category" id="2" value="2">
                                    <label class="form-check-label" for="2">Ice Food/Beverage</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Preparation /  Steps How to Make</label>
                            <textarea id="summernote" name="content" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-label-success waves-effect">Save Edit</button>
                    </tbody>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <!-- Bootstrap 5 CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.5.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .bootstrap-tagsinput {
            display: block;
            padding: 8px;
        }
        .tag.label.label-info {
            color: #000000;
            background-color: #F9F9F9 !important;
            border-radius: 3px;
            box-shadow: inset 0 -1px 0 rgba(0,0,0,0.15);
            padding: 5px 10px;
        }
        .note-icon-caret:before {
            display: none;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.5.0/bootstrap-tagsinput.min.js" integrity="sha512-p9c//cVo76ZPq+afWSNPqiNDCwLR5uW605/nXIBQF/SdA72d5L/iuKjxVVHC2INv4k3OGbpLc2SF4ODyq6EeTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['codeview', 'help']],
                ],
            });
        });
    </script>
@endpush
