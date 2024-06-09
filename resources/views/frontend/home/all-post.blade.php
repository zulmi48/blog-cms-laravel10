@extends('frontend.layouts.app')
@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-12">
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <!-- Search widget-->
                    <div class="mb-3">
                        <form action="{{ route('home.search-post') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" name="keyword" type="text" placeholder="Search article..." />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                        </form>
                    </div>
                    @if ($keyword)
                        <small class="mb-2">Showing article with keyword "<strong>{{ $keyword }}</strong>"</small>
                    @endif
                    @forelse ($articles as $article)
                        <div class="col-lg-4" data-aos="fade-up">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="{{ route('home.show', $article->slug) }}"><img class="card-img-top post"
                                        src="{{ asset('storage/back/' . $article->img) }}" alt="..." /></a>
                                <div class="card-body heigth">
                                    <div class="small text-muted">
                                        {{ $article->created_at->format('d M, Y') }}
                                    </div>
                                    <span>
                                        <a href="{{ route('home.category', $article->categories->slug) }}"
                                            class="badge bg-info text-decoration-none">{{ $article->categories->name }}</a>
                                    </span>
                                    <h2 class="card-title h4">{{ $article->title }}</h2>
                                    <p class="card-text">{{ Str::limit(strip_tags($article->description), 200, '...') }}</p>
                                    <a class="btn btn-primary" href="{{ route('home.show', $article->slug) }}">Read more
                                        →</a>
                                </div>
                            </div>
                        </div>
                    @empty
                    <span class="mb-3 text-lg-center h3"><strong>Article Not Found!</strong></span>
                    @endforelse
                </div>
                <!-- Pagination-->
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
