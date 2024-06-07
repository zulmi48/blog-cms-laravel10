<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="auto">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">My Blog</a>
    <div class="float-end me-3">
        <a class="me-2 text-decoration-none text-white" href="{{ route('home.index') }}">Go to Blog</a>
        <span class="fw-bold text-white-50">{{ auth()->user()->name }} {{ auth()->user()->role == 1 ? '(Admin)' : '' }}</span>
    </div>
</header>
