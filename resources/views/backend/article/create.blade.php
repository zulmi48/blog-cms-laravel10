@extends('backend.layouts.app')
@section('title', 'Create Article')
@section('title-page', 'Create New Article')

@section('content')
    <div class="p-3">
        @include('backend.layouts.error-validation')
        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control @error('title')
                        is-invalid
                    @enderror"
                            name="title" id="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select
                            class="form-control @error('categories_id')
                        is-invalid
                    @enderror"
                            name="categories_id" id="category">
                            <option value="" hidden>-- Choose --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="desc-editor" cols="30" rows="5"
                        class="form-control @error('description')
                    is-invalid
                @enderror">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="img">Image (Maks 2MB)</label>
                    <input type="file" name="img" id="img"
                        class="form-control @error('img')
                    is-invalid
                @enderror"
                        value="{{ old('img') }}">

                    <div class="mt-1">
                        <img src="" class="img-thumbnail img-preview" width="100px">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status"
                            class="form-control @error('status')
                        is-invalid
                    @enderror">
                            <option value="" hidden>-- Choose --</option>
                            <option value="0">Private</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="publish_date">Publish Date</label>
                        <input type="date" name="publish_date" id="publish_date"
                            class="form-control @error('publish_date')
                        is-invalid
                    @enderror"
                            value="{{ old('publish_date') }}">
                    </div>
                </div>
            </div>
            <div class="float-start">
                <a href="{{ route('article.index') }}" class="btn btn-outline-secondary btn-lg">Back</a>
            </div>
            <div class="float-end">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    {{-- File Manager Configurasi --}}
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            clipboard_handleImages: false,
        }
    </script>

    <script>
        // CKEDITOR 4
        CKEDITOR.replace('desc-editor', options);

        // Image Preview
        $('#img').change(function() {
            previewImg(this)
        })

        function previewImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('.img-preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
@endpush
