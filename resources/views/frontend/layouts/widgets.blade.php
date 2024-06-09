<div class="col-lg-4" data-aos="fade-left">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('home.search') }}" method="post">
                @csrf
                <div class="input-group">
                    <input class="form-control" name="keyword" type="text" placeholder="Search article..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    @foreach ($categories as $category)
                        <span>
                            <a href="{{ route('home.category', $category->slug) }}"
                                class="bg-info badge text-decoration-none">{{ $category->name }} ({{ $category->articles_count }})</a>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Post widget-->
    <div class="card mb-4">
        <div class="card-header">Popular Post</div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($popular_posts as $post)
                    <li class="list-group-item">
                        <img width="20%" src="{{ asset('storage/back/' . $post->img) }}" alt="">
                        <a href="{{ route('home.show', $post->slug) }}" class="text-decoration-none text-black">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
            use, and feature the Bootstrap 5 card component!</div>
    </div>
</div>
