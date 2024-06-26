@extends('frontend.layouts.app')
@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $article->title }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{ $article->created_at->format('F d, Y') }} by
                            {{ $article->users->name }}</div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light"
                            href="#!">{{ $article->categories->name }}</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/back/' . $article->img) }}"
                            alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        {!! $article->description !!}
                        </section>
                        <div class="my-3">
                            <p class="fw-bold h6">Share this article</p>
                            <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="btn btn-primary btn-sm" target="_blank">
                                <i class="bi bi-facebook"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="btn btn-success btn-sm" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                </article>
                <!-- Comments section-->
                {{-- <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4">
                                <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                            </form>
                            <!-- Comment with nested comments-->
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="flex-shrink-0"><img class="rounded-circle"
                                        src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    If you're going to lead a space frontier, it has to be government; it'll never be
                                    private enterprise. Because the space frontier is dangerous, and it's expensive, and it
                                    has unquantified risks.
                                    <!-- Child comment 1-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle"
                                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            And under those conditions, you cannot establish a capital-market evaluation of
                                            that enterprise. You can't get investors.
                                        </div>
                                    </div>
                                    <!-- Child comment 2-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle"
                                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            When you put money directly to a problem, it makes a good headline.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single comment-->
                            <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle"
                                        src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When I look at the universe and all the ways the universe wants to kill us, I find it
                                    hard to reconcile that with statements of beneficence.
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
            </div>
            <!-- Side widgets-->
            @include('frontend.layouts.widgets')
        </div>
    </div>
@endsection
