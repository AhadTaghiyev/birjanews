@extends('layouts.admin')

@section('content')
    <div class="col-sm-1"> </div>

    <div class="col-sm-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-white">Əlaqə</h5>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::model($contact, ['method'=>'PATCH', 'action'=>['AdminContactController@update', $contact->id], 'files'=>true ]) !!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#about_az">AZ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#about_ru">RU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#about_en">EN</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="about_az" class="tab-pane active">
                                    <br />
                                    <a class="btn btn-primary" data-toggle="collapse" href="#seoAZ" role="button"
                                       aria-expanded="false" aria-controls="collapseExample">
                                        SEO tools
                                    </a>
                                    <hr>

                                    <div class="collapse" id="seoAZ">
                                        <div class="form-group">
                                            {!! Form::label('seo_title_az', 'SEO Title AZ:') !!}
                                            {!! Form::text('seo_title_az', $contact->seo_title_az, ['class' => ($errors->has('seo_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_title_az') }}</small>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('seo_keywords_az', 'SEO Keywords AZ:') !!}
                                            {!! Form::text('seo_keywords_az', $contact->seo_keywords_az, ['class' => ($errors->has('seo_keywords_az')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_keywords_az') }}</small>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('seo_desctioption_az', 'SEO Description AZ:') !!}
                                            {!! Form::text('seo_desctioption_az', $contact->seo_desctioption_az, ['class' => ($errors->has('seo_desctioption_az')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_desctioption_az') }}</small>
                                        </div>
                                        <hr/>

                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('address_az', '1-ci Ünvan AZ:') !!}
                                        {!! Form::text('address_az', $contact->address, ['class'=>'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('address_az') }}</small>
                                    </div>
                                </div>
                                <div id="about_ru" class="tab-pane ">
                                    <br/>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#seoRU" role="button"
                                       aria-expanded="false" aria-controls="collapseExample">
                                        SEO tools
                                    </a>
                                    <hr>
                                    <div class="collapse" id="seoRU">
                                        <div class="form-group">
                                            {!! Form::label('seo_title_ru', 'SEO Title RU:') !!}
                                            {!! Form::text('seo_title_ru', $contact->seo_title_ru, ['class' => ($errors->has('seo_title_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_title_ru') }}</small>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('seo_keywords_ru', 'SEO Keywords RU:') !!}
                                            {!! Form::text('seo_keywords_ru', $contact->seo_keywords_ru, ['class' => ($errors->has('seo_keywords_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_keywords_ru') }}</small>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('seo_desctioption_ru', 'SEO Description RU:') !!}
                                            {!! Form::text('seo_desctioption_ru', $contact->seo_desctioption_ru, ['class' => ($errors->has('seo_desctioption_ru')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_desctioption_ru') }}</small>
                                        </div>
                                        <hr/>

                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('address_ru', '1-ci Ünvan RU:') !!}
                                        {!! Form::text('address_ru', $contact->address, ['class'=>'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('address_ru') }}</small>
                                    </div>
                                </div>
                                <div id="about_en" class="tab-pane ">
                                    <br/>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#seoEN" role="button"
                                       aria-expanded="false" aria-controls="collapseExample">
                                        SEO tools
                                    </a>
                                    <hr>
                                    <div class="collapse" id="seoEN">
                                        <div class="form-group">
                                            {!! Form::label('seo_title_en', 'SEO Title EN:') !!}
                                            {!! Form::text('seo_title_en', $contact->seo_title_en, ['class' => ($errors->has('seo_title_en')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_title_en') }}</small>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('seo_keywords_en', 'SEO Keywords EN:') !!}
                                            {!! Form::text('seo_keywords_en', $contact->seo_keywords_en, ['class' => ($errors->has('seo_keywords_en')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_keywords_en') }}</small>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('seo_desctioption_en', 'SEO Description EN:') !!}
                                            {!! Form::text('seo_desctioption_en', $contact->seo_desctioption_en, ['class' => ($errors->has('seo_desctioption_en')) ? 'form-control form-error' : 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('seo_desctioption_en') }}</small>
                                        </div>
                                        <hr/>

                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('address_en', '1-ci Ünvan EN:') !!}
                                        {!! Form::text('address_en', $contact->address, ['class'=>'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('address_en') }}</small>
                                    </div>
                                </div>
                            </div>

                        <hr>
                            <div class="form-group">
                                {!! Form::label('telefon', 'Telefon:') !!}
                                {!! Form::text('telefon', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('telefon') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('mobil', 'Whatsapp:') !!}
                                {!! Form::text('mobil', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('mobil') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'E-mail:') !!}
                                {!! Form::text('email', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                {!! Form::label('linkedin', 'LinkedIn:') !!}--}}
{{--                                {!! Form::text('linkedin', null, ['class'=>'form-control']) !!}--}}
{{--                                <small class="text-danger">{{ $errors->first('linkedin') }}</small>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                {!! Form::label('facebook', 'Facebook:') !!}
                                {!! Form::text('facebook', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('facebook') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('instagram', 'Instagram:') !!}
                                {!! Form::text('instagram', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('instagram') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('youtube', 'Youtube:') !!}
                                {!! Form::text('youtube', null, ['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('youtube') }}</small>
                            </div>
                        <div class="col-sm-12" style="text-align: right;">
                            <div class="form-group">
                                {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-2']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
