@extends('frontend.layouts.app')
@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                @if ($articles->count() != 0 && Route::currentRouteName() == 'home.index')
                    @include('frontend.layouts.featured')
                @endif
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @forelse ($articles as $article)
                    <div class="col-lg-6" data-aos="fade-up">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="{{ route('home.show', $article->slug) }}"><img class="card-img-top post"
                                    src="{{ asset('storage/back/' . $article->img) }}" alt="..." /></a>
                        <div class="card-body heigth">
                                <div class="small text-muted">
                                    {{ $article->created_at->format('d M, Y') }}, Written by {{ $article->users->name }}
                                </div>
                                <span>
                                    <a href="{{ route('home.category', $article->categories->slug) }}"
                                        class="badge bg-info text-decoration-none">{{ $article->categories->name }}</a>
                                </span>
                                <h2 class="card-title h4">{{ $article->title }}</h2>
                                <p class="card-text">{{ Str::limit(strip_tags($article->description), 150, '...') }}</p>
                                <a class="btn btn-primary" href="{{ route('home.show', $article->slug) }}">Read more
                                    →</a>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h1 class="text-center"><strong>Not Found!</strong></h1>
                    @endforelse 
                </div>
                <!-- Pagination-->
                {{ $articles->links() }}
            </div>
            <!-- Side widgets-->
            @include('frontend.layouts.widgets')
        </div>
    </div>
@endsection
