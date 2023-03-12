<div class="sidebar">

    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
        <form action="{{ route('blog') }}">
            <input type="text" name="q">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
        <ul>
            @foreach ($categories as $category)
                <li><a href="#">{{ $category->name }} <span>({{ $category->posts }})</span></a></li>
            @endforeach
        </ul>
    </div><!-- End sidebar categories-->

    <h3 class="sidebar-title">Recent Posts</h3>
    <div class="sidebar-item recent-posts">
        @foreach ($recentPosts as $recent)
            <div class="post-item clearfix">
                <img src="{{ asset('storage/'.$recent->image) }}" alt="">
                <h4><a href="{{ route('blog.show', $recent->slug )}}">{{ $recent->getShortTitle(25) }}</a></h4>
                <time datetime="{{ $recent->created_at }}">{{ $recent->getHumanize() }}</time>
            </div>
        @endforeach
    </div><!-- End sidebar recent posts-->

    {{-- <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
        <ul>
            <li><a href="#">App</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Mac</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Studio</a></li>
            <li><a href="#">Smart</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
        </ul>
    </div><!-- End sidebar tags--> --}}

</div>