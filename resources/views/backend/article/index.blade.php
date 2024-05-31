@extends('backend.layouts.app')
@section('title', 'Article')
@section('title-page', 'Article')
@push('css')
@endpush

@section('content')
    <div class="p-3">
        @if (session('message'))
            <div class="mb-3 alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#create-modal"><i
                class="bi bi-file-earmark-plus"></i></button>
        @include('backend.layouts.error-validation')
        <table class="table table-responsive" id="data-articles">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Publish Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->categories->name }}</td>
                        <td>{{ $article->status }}</td>
                        <td>{{ $article->publish_date }}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-info btn-sm"><i class="bi bi-box-arrow-up-right"></i></button>
                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#update-modal{{ $article->id }}"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal{{ $article->id }}"><i
                                        class="bi bi-eraser-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('js')
@endpush
