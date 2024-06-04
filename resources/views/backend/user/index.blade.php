@extends('backend.layouts.app')
@section('title', 'User Management')
@section('title-page', 'User Management')

@section('content')
    <div class="p-3">
        <div class="swal" data-swal="{{ session('message') }}"></div>
        @if (auth()->user()->role == 1)
            <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#create-modal">Register</button>
            @include('backend.layouts.error-validation')
        @endif
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
                                    data-bs-target="#update-modal{{ $user->id }}">Edit</button>
                                @if (auth()->user()->role == 1)
                                    @if ($user->id != auth()->user()->role)
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal{{ $user->id }}">Delete</button>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('backend.user.create-modal')
    @include('backend.user.update-modal')
    @include('backend.user.delete-modal')
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
