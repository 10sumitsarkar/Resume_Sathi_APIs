<div class="each-side-bar-category-div mb-3">
    <h4 class="heading">Related Categories</h4>
    <div class="container-fluid px-0">
        <div class="row">
            @foreach ($languages as $language)
                <div class="col-6 col-md-3 col-lg-6 px-1 mt-2">
                    <a href="{{ route('our-tutorials', $language->url_name) }}">
                        <h5 class="each-category">
                            {{ $language->title }}
                        </h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
