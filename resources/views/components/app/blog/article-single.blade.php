<article class="entry entry-single">
    <div class="entry-img">
        <img src="{{ asset('storage/' . $blog->image ) }}" alt="" class="img-fluid">
    </div>
    <h2 class="entry-title">
        <a href="blog-single.html">{{ $blog->title }}</a>
    </h2>
    <div class="entry-meta">
        <ul>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a>
            </li>
            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time
                        datetime="2020-01-01">Jan 1, 2020</time></a></li>
            {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12
                    Comments</a></li> --}}
        </ul>
    </div>
    <div class="entry-content">
        {{ $blog->renderContent() }}
    </div>

    <div class="entry-footer">
        <i class="bi bi-folder"></i>
        <ul class="cats">
            <li><a href="#" class="category_link">{{ $blog->category->name }}</a></li>
        </ul>

        {{-- <i class="bi bi-tags"></i>
        <ul class="tags">
            <li><a href="#">Creative</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
        </ul> --}}
    </div>
</article>
