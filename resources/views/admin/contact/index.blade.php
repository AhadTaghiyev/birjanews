@extends('layouts.admin')

@section('content')
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">

                </div>
                <h2 class="card-title">Əlaqə</h2>
            </header>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::model($contact, ['method'=>'PATCH', 'action'=>['AdminContactController@update', $contact->id], 'files'=>true ]) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="toggle toggle-primary" data-plugin-toggle
                             data-plugin-options="{ 'isAccordion': true }">
                            <section class="toggle">
                                <label>SEO Tools</label>
                                <div class="toggle-content">
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
                                </div>
                            </section>
                        </div>


                        <div class="form-group">
                            {!! Form::label('address_az', 'Ünvan:') !!}
                            {!! Form::text('address_az', $contact->address, ['class'=>'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('address_az') }}</small>
                        </div>

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
        </section>
    </div>
@stop
