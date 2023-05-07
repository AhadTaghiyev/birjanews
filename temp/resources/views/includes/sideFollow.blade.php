<div class="widget contact-widget overlay wow  delay-0-1s slow">
    <i class="flaticon-headphones-with-thin-mic"></i>
    <h5>@lang('common.have_any_questions')</h5>
    <h6>@lang('common.contact_me')</h6>
    <ul>
        <li>|</li>
        <li><i class="fas fa-phone-alt"></i> <a href="tel:{{ $contact[0]->telefon }}" class="phone_call_hover">{{ $contact[0]->telefon }} </a></li>
        <li><i class="fas fa-at"></i><a class="phone_call_hover" href = "mailto: {{ $contact[0]->email }}">{{ $contact[0]->email }}</a></li>
    </ul>
</div>

<div class="widget instagram-post-widget wow  delay-0-2s slow">
    <h4 class="widget-title">Instagram</h4>
    <div class="instagram-posts">
        @foreach($instagrams as $instagram)
            <a href="{{ $contact[0]->instagram }}" target="_blank"><img src="{{asset('files/img/insta/'.$instagram->photo->file) }}" alt="Instagram"></a>
        @endforeach
    </div>
</div>

<div class="widget about-me-widget overlay wow  delay-0-1s slow">
    <div class="my-profile-links">
        <span>@lang('common.follow_me') :</span>
        <div class="social-icon">
            @if(strlen($contact[0]->mobil)>=3)
                <a href="https://wa.me/{{$contact[0]->mobil}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
            @endif
            <a href="{{ $contact[0]->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ $contact[0]->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="{{ $contact[0]->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>
