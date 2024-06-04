@foreach ($users as $user)
    <div class="modal fade" id="update-modal{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">Name : </label>
                            <input type="text"
                                class="form-control mt-1  @error('name')
                        is-invalid
                    @enderror"
                                name="name" id="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email Address : </label>
                            <input type="email"
                                class="form-control mt-1  @error('email')
                        is-invalid
                    @enderror"
                                name="email" id="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">Password : </label>
                            <input type="password"
                                class="form-control mt-1  @error('password')
                        is-invalid
                    @enderror"
                                name="password" id="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Password Confirmation : </label>
                            <input type="password"
                                class="form-control mt-1  @error('password_confirmation')
                        is-invalid
                    @enderror"
                                name="password_confirmation" id="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
