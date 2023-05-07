@if($AllowProject[0]->status == 1)
<section class="featured-post mb-100">
    <div class="section-title text-center mb-45">
        <h2>@lang('menu.Projects')</h2>
        <div class="separator mt-10">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
    </div>
    <div class="featured-carousel owl-carousel">
        @foreach($projects as $project)

            <div class="blog-single-item style-four">
                <div class="blog-image">
                    <img src="{{ asset('files/img/projects/'.$project->photo_photo[0]->file) }}" alt="Featured post image">
                </div>
                <div class="blog-content flex-dir-middle">
                    <div class="content-bottom">
                        <a class="link-icon" href="{{ route('project', ['id'=>$project->id, 'locale'=>app()->getLocale()]) }}"><i class="flaticon-link"></i></a>
                        <h6><a href="{{ route('project', ['id'=>$project->id, 'locale'=>app()->getLocale()]) }}">{{ $project->{'title_'.app()->getLocale()} }}</a></h6>
                        <div class="by-views">

                            <span class="date">{{ date('d-M-Y', strtotime($project->project_date)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="style-btn-all">
        <a href="{{ route('projects', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow">@lang('common.All_btn')</a>
    </div>
</section>
@endif
