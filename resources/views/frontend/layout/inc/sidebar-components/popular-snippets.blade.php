<div class="each-side-bar-post-div mb-3">
    <h4 class="heading">Popular Snippets</h4>
    <ul>
        @foreach ($popular_snipits as $item)
            <li @if (strpos($item->canonical_tag, 'preview-snippets') !== false) class="d-none" @endif>
                <a href="{{ url($item->canonical_tag) }}">{{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
