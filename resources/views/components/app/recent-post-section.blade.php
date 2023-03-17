<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Blog</h2>
            <p>Recent posts form our Blog</p>
        </header>

        <div class="row">
            @foreach ($posts as $recent)
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ asset('storage/' . $recent->image ) }}" class="img-fluid"
                                alt=""></div>
                        <span class="post-date">{{ $recent->getHumanize() }}</span>
                        <h3 class="post-title">{{ $recent->getShortTitle() }}</h3>
                        <a href="{{ route('blog.show', $recent->slug )}}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>