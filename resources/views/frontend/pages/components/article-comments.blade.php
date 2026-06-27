@foreach ($comments as $item)
    <div class="commenter-user-details">
        <div class="user-img-div">
            <div class="img-inner">
                <img src="{{ asset('front-assets/images/icons/commenter-img.svg') }}" width="23" height="26"
                    alt="User">
            </div>
        </div>
        <div class="details">
            <p class="name">{{ $item->name }}</p>
            <p class="timing">{{ date_format(date_create($item->created_at), 'd/m/Y h:i:s A ') }}</p>
            <p class="comments-para"> {{ $item->text }}</p>
        </div>
    </div>
@endforeach
