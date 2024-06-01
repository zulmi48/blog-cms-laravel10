@extends('backend.layouts.app')
@section('title', 'Article')
@section('title-page', 'Article')
@push('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="p-3">
        @if (session('message'))
            <div class="mb-3 alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <a class="btn btn-success mb-2" href="{{ route('article.create') }}"><i
                class="bi bi-file-earmark-plus"></i></a>
        <table class="table table-striped" id="data-articles">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Publish Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->categories->name }}</td>
                        <td class="text-center">{{ $article->views }}</td>
                        <td>
                            {!! $article->status == 0 ? '<span class="badge bg-danger">Private</span>' : '<span class="badge bg-success">Published</span>' !!}                            
                        </td>
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
<script src="{{ asset('js/datatables.min.js') }}"></script>
@push('js')
    <script src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#data-articles").DataTable();
        });
    </script>
@endpush
