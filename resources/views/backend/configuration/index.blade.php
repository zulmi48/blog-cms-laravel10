@extends('backend.layouts.app')
@section('title', 'Configuration')
@section('title-page', 'Configuration Your Blog')

@section('content')
    <div class="p-3">
        <div class="swal" data-swal="{{ session('message') }}"></div>
        @include('backend.layouts.error-validation')
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($configs as $config)
                    <tr>
                        <td>{{ Str::ucfirst($config->name) }}</td>
                        <td>{{ $config->value }}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#update-modal{{ $config->id }}"><i
                                        class="bi bi-pencil-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $configs->links() }}
    </div>

    @include('backend.configuration.update-modal')
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
