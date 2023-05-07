<section class="gallery-section mb-85">
    <div class="section-title text-center mb-45 wow delay-0-1s slow">
        <h2>Photo Gallery</h2>
        <div class="separator mt-10">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
    </div>

    <div class="gallery-wrap gallery-more">
        <div class="container">
            <div class="row">
                @foreach($gallery_photos as $gallery_photo)
                <div class="col-lg-4">
                    <div class="gallery-single-item wow delay-0-2s slow">
                        <div class="gallery-image">
                            <img src="{{ asset('files/img/gallery/'.$gallery_photo->file) }}" alt="{{ $gallery_photo->alt_tag }}">
                        </div>
                        <div class="gallery-content">
                            <div class="place-date">
{{--                                <span>Category: {{ $gallery_photo->categoryGallery->{'name_'.app()->getLocale()} }}</span>--}}
                            </div>
                            <a href="{{ asset('files/img/gallery/'.$gallery_photo->file) }}" class="zoom"><i class="flaticon-add"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</section>
