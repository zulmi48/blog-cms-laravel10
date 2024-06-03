@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('title-page', 'Dashboard')

@section('content')
    <div class="p-3">
        {{-- Card Info Total --}}
        <div class="row">
            <div class="col-6">
                <div class="card text-bg-success mb-3" style="max-width: 100%;">
                    <div class="card-header">Total Article</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_article }} Article</h5>
                        <a href="{{ route('article.index') }}" class="card-text text-decoration-none text-white-50">View
                            All</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-bg-info mb-3" style="max-width: 100%;">
                    <div class="card-header">Total Category</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_category }} Category</h5>
                        <a href="{{ route('category.index') }}" class="card-text text-decoration-none text-black-50">View
                            All</a>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Tabel Latest and Popular Article --}}
        <div class="row">
            <div class="col-6">
                <h5>Latest Article</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latest_article as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->categories->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('article.show', $item->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h5>Popular Article</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($popular_article as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->categories->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('article.show', $item->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
