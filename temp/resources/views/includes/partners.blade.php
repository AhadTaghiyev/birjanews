@if($AllowPartner[0]->status == 1)
<section class="featured-post mb-100">
    <div class="section-title text-center mb-45">
        <h2>@lang('common.clients')</h2>
        <div class="separator mt-10">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
    </div>
    <div class="brands-carousel owl-carousel">
        @foreach($partners as $partner)

            <div class="blog-single-item style-four">
                <div class="blog-image img-pad-20">
                    <img src="{{ asset('files/img/partners/'.$partner->photo->file) }}" alt="{{ $partner->name }}">
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif
