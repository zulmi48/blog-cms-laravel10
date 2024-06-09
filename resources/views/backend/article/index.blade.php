@extends('backend.layouts.app')
@section('title', 'Article')
@section('title-page', 'Article')
@push('css')
    <link href="{{ asset('back/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="p-3">
        <div class="swal" data-swal="{{ session('message') }}"></div>
        <a class="btn btn-success mb-2" href="{{ route('article.create') }}"><i class="bi bi-file-earmark-plus"></i></a>
        <table class="table table-striped" id="data-articles">
            <thead>
                <tr>
                    <th>No.</th>
                    <th width="300px">Title</th>
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
                            {!! $article->status == 0
                                ? '<span class="badge bg-danger">Private</span>'
                                : '<span class="badge bg-success">Published</span>' !!}
                        </td>
                        <td>{{ $article->publish_date }}</td>
                        <td>
                            <div class="text-center">
                                <a href="{{ route('article.show', $article->slug) }}" class="btn btn-info btn-sm"><i
                                        class="bi bi-box-arrow-up-right"></i></a>
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-secondary btn-sm"><i
                                        class="bi bi-pencil-fill"></i></a>
                                <a id="delete" onclick="deleteArticle(this)" data-id="{{ $article->id }}"
                                    class="btn btn-danger btn-sm"><i class="bi bi-eraser-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script src="{{ asset('back/js/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Data Table --}}
    <script>
        $(document).ready(function() {
            $("#data-articles").DataTable();
        });
    </script>
    {{-- Sweet Alert --}}
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

        // Delete Confirmation
        function deleteArticle(e) {
            let id = e.getAttribute('data-id')
            Swal.fire({
                title: "Delete",
                text: "Are you sure want to delete this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '/article/' + id,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                            }).then((result) => {
                                window.location.href = '/article'
                            })
                        },
                        error: function(xhr, ajaxOptions, throwError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError)
                        }
                    })
                }
            })
        }
    </script>
@endpush
