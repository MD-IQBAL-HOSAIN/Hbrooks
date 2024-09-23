@extends('backend.app', ['title' => 'Create Upcomming Album'])

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush

@section('main')
    <div class="container content-wrapper mt-3" style="width: 60%;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center card-title">Create Upcomming Album </h1> <hr>
                        <div class="mt-4">
                            <form class="forms-sample"action="{{ route('upcomming.album.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-lable">Title:</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-lable">Sub Title:</label>
                                    <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" value="{{old('sub_title')}}">
                                    @error('sub_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">City</label>
                                        {{-- <textarea class="form-control @error('location') is-invalid @enderror" name="location" id="description">{{ old('location') }}</textarea> --}}
                                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{old('location')}}">
                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row align-items-center">
                                    <div class="form-group row mb-3">
                                        <div class="col">
                                            <label class="form-label">Image</label>
                                            <input type="file" class="dropify form-control" id="image" name="image_url"
                                                data-default-file="{{ asset('backend/images/placeholder/image_placeholder.png') }}">

                                            @error('image_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <!-- Form fields on the right side -->
                                        <div class="form-group mb-3">
                                            <label class="form-label">Performance Date:</label>
                                            <input type="date" class="form-control @error('performance_date') is-invalid @enderror"
                                                id="performance_date" name="performance_date" value="{{ old('performance_date') }}">
                                            @error('performance_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Add more form fields here as needed -->
                                    </div>
                                </div>




                                {{-- <div class="form-group mb-3">
                                    <label class="form-lable">Performance Time:</label>
                                    <input type="time" class="form-control @error('performance_time') is-invalid @enderror" id="performance_time" name="performance_time" value="{{old('performance_time')}}">
                                    @error('performance_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <button type="submit" class="btn btn-primary me-2 mt-2">Submit</button>
                                <a href="{{ route('upcomming.album.index') }}" class="btn btn-danger ">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
