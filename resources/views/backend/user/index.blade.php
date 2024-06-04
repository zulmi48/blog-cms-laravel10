@extends('backend.layouts.app')
@section('title', 'User Management')
@section('title-page', 'User Management')

@section('content')
    <div class="p-3">
        @if (session('message'))
            <div class="mb-3 alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#create-modal">Register</button>
        @include('backend.layouts.error-validation')
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#update-modal{{ $user->id }}"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal{{ $user->id }}"><i
                                        class="bi bi-eraser-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- @include('backend.category.create-modal')
    @include('backend.category.update-modal')
    @include('backend.category.delete-modal') --}}
@endsection
