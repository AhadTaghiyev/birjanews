@extends('layouts.admin')

@section('content')
    @include('includes.timyeditor')

    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">

                </div>
                <h2 class="card-title">Yeni İstifadəçi</h2>
            </header>
            <div class="card-body">
                {!! Form::model($about, ['method'=>'PATCH', 'action'=>['AdminAboutController@update', $about[0]->id]]) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="toggle toggle-primary" data-plugin-toggle data-plugin-options="{ 'isAccordion': true }">
                    <section class="toggle">
                        <label>SEO Tools</label>
                        <div class="toggle-content">
                            <div class="form-group">
                                {!! Form::label('seo_title_az', 'SEO Title AZ:') !!}
                                {!! Form::text('seo_title_az', $about[0]->seo_title_az, ['class' => ($errors->has('seo_title_az')) ? 'form-control form-error' : 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('seo_title_az') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('seo_keywords_az', 'SEO Keywords AZ:') !!}
                                {!! Form::text('seo_keywords_az', $about[0]->seo_keywords_az, ['class' => ($errors->has('seo_keywords_az')) ? 'form-control form-error' : 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('seo_keywords_az') }}</small>
                            </div>
                            <div class="form-group">
                                {!! Form::label('seo_desctioption_az', 'SEO Description AZ:') !!}
                                {!! Form::text('seo_desctioption_az', $about[0]->seo_desctioption_az, ['class' => ($errors->has('seo_desctioption_az')) ? 'form-control form-error' : 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('seo_desctioption_az') }}</small>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="form-group">
                    {!! Form::label('title_az', 'Başlıq AZ:') !!}
                    {!! Form::text('title_az', $about[0]->title_az, ['class' => ($errors->has('title_az')) ? 'form-control form-error' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('title_az') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('text_az', 'Metn AZ:') !!}
                    {!! Form::textarea('text_az', $about[0]->text_az, ['class' => ($errors->has('text_az')) ? 'form-control form-error textarea' : 'textarea form-control']) !!}
                    <small class="text-danger">{{ $errors->first('text_az') }}</small>
                </div>

                <div class="col-sm-12 mt-3" style="text-align: right;">
                    <div class="form-group">
                        {!!  Form::submit('Yenilə', ['class'=>'btn btn-primary col-sm-2']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </section>
    </div>

@stop
