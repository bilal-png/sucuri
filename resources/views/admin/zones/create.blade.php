@extends('layouts.app')

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['admin.zones.store']]) !!}

    <div class="panel panel-default" style="background: white;">
        <div class="panel-heading">
            <h3 class="page-title" style="font-size: 20px !important;">Add New Domain</h3>

        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('name', 'Name (domain name)*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'id'=>"zName", 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('url', 'Domain URL*', ['class' => 'control-label']) !!}
                    {!! Form::text('url', old('url'), ['class' => 'form-control', 'id'=>"url", 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('url'))
                        <p class="help-block">
                            {{ $errors->first('url') }}
                        </p>
                    @endif
                </div>
            </div>

            



            <div class="row">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('a_key', 'Api Key*', ['class' => 'control-label']) !!}
                    {!! Form::text('a_key', old('a_key'), ['class' => 'form-control', 'id'=>"a_key", 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('a_key'))
                        <p class="help-block">
                            {{ $errors->first('a_key') }}
                        </p>
                    @endif
                </div>
            </div>

           </div>
           </div>
           <input type="hidden" name="user_id" value="<?= auth()->user()->id ?>">
    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-lg btn-danger']) !!}
    {!! Form::close() !!}
    <br>
    <br>
    <br>
    <br>
    <br>
@stop

