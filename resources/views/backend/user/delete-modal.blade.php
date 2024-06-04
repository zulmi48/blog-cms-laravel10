@foreach ($users as $user)
    <div class="modal fade" id="delete-modal{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <h3>Are you sure you want to delete this?</h3>
                        <div class="mb-3">
                            <ul>
                                <li>{{ $user->name }}</li>
                                <li>{{ $user->email }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
