@extends('backend.layouts.app')
@section('title', 'Category')
@section('title-page', 'Category')

@section('content')
    <div class="p-3">
        <div class="swal" data-swal="{{ session('message') }}"></div>
        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#create-modal"><i
                class="bi bi-file-earmark-plus"></i></button>
        @include('backend.layouts.error-validation')
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#update-modal{{ $category->id }}"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal{{ $category->id }}"><i
                                        class="bi bi-eraser-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('backend.category.create-modal')
    @include('backend.category.update-modal')
    @include('backend.category.delete-modal')
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Success Alert
        const swal = $('.swal').data('swal')
        if (swal) {
            Swal.fire({
                title: 'Success',
                text: swal,
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
        }
    </script>
@endpush
