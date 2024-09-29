@extends('backend.app', ['title' => 'Landing Page Biography'])

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 150px;
    }
</style>
@endpush

@section('main')
<!-- Topbar -->
@include('backend.partials.topbar')
<!-- End of Topbar -->

<!-- Main Content -->
<div class="container mt-4 content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-2xl"><strong>Biography Section</strong></h2>
                    <hr>

                    <!-- Add success/error message display -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="mt-4">
                        <form action="{{ route('landingpage.banner.update', $data[1]->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[1]->id }}">

                            <div class="form-group row mb-3">
                                <div class="col">
                                    <label class="form-lable"><strong>Title</strong></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $data[1]->title)}}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-lable"><strong>Sub Title</strong></label>
                                    <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" id="sub_title" value="{{ old('sub_title', $data[1]->sub_title) }}">
                                    @error('sub_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                    <label class="form-lable"><strong>Description</strong></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description', $data[1]->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label class="form-lable"><strong>Image</strong></label>
                                    <input type="file" class="dropify form-control @error('image') is-invalid @enderror" name="image_url" id="image" accept="image/*" data-default-file="{{ asset($data[1]->image_url) }}">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
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
