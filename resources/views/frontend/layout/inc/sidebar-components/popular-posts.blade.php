<div class="each-side-bar-post-div mb-3">
    <h4 class="heading">Popular Posts</h4>
    <ul>
        @foreach ($popular as $post)
        <li><a href="{{ url($post->canonical_tag) }}">{{ $post->article_title }}</a></li>
        @endforeach
    </ul>
</div>