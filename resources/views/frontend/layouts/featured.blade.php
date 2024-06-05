<div class="card mb-4">
    <a href="#!"><img class="card-img-top" src="{{ asset('storage/back/'. $featured_post->img) }}"
            alt="..." /></a>
    <div class="card-body">
        <div class="small text-muted">{{ $featured_post->created_at->format('d M, Y') }}</div>
        <h2 class="card-title">{{ $featured_post->title }}</h2>
        <p class="card-text">{{ Str::limit(strip_tags($featured_post->description), 300, '...') }}</p>
        <a class="btn btn-primary" href="#!">Read more →</a>
    </div>
</div>