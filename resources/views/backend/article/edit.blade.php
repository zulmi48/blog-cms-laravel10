@extends('backend.layouts.app')
@section('title', 'Edit Article')
@section('title-page', 'Edit Article')

@section('content')
    <div class="p-3">
        @include('backend.layouts.error-validation')
        <form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control @error('title')
                        is-invalid
                    @enderror"
                            name="title" id="title" value="{{ old('title', $article->title) }}">
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
                            @foreach ($categories as $category)
                                @if ($category->id == $article->categories_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="descripton" cols="30" rows="5"
                        class="form-control @error('description')
                    is-invalid
                @enderror">{{ old('description', $article->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="img">Image (Maks 2MB)</label>
                    <input type="file" name="img" id="img"
                        class="form-control @error('img')
                    is-invalid
                @enderror">
                    <input type="text" name="oldImg" value="{{ $article->img }}" hidden>
                    <div class="mt-1">
                        <small>Current Image</small><br>
                        <img src="{{ asset('storage/back/' . $article->img) }}" alt="" width="10%">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status"
                            class="form-control @error('status')
                        is-invalid
                    @enderror">
                            <option value="0" {{ $article->status == 0 ? 'selected' : null }}>Private</option>
                            <option value="1" {{ $article->status == 1 ? 'selected' : null }}>Published</option>
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
                            value="{{ old('publish_date', $article->publish_date) }}">
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
