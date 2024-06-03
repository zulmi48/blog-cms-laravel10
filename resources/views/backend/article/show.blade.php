@extends('backend.layouts.app')
@section('title', 'Detail Article')
@section('title-page', 'Detail Article')

@section('content')
    <div class="p-3">
        <div class="float-end mb-3">
            <a href="{{ route('article.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        </div>
        <table class="table table-striped-columns">
            <tr>
                <th width="250px">Title</th>
                <td>{{ $article->title }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $article->categories->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{!! $article->description !!}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <a href="{{ asset('storage/back/' . $article->img) }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('storage/back/' . $article->img) }}" alt="" width="20%">
                    </a>
                </td>
            </tr>
            <tr>
                <th>Views</th>
                <td>{{ $article->views }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    {!! $article->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>' !!}
                </td>
            </tr>
            <tr>
                <th>Publish Date</th>
                <td>{{ $article->publish_date }}</td>
            </tr>
        </table>
    </div>
@endsection
