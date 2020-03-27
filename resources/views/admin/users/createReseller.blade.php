@extends('layouts.app')

@section('content')

    {!! Form::open(['method' => 'POST', 'route' => ['admin.resellers.store']]) !!}

    <div class="panel panel-default" style="background: white;">
        <div class="panel-heading">
          <h3 style="font-size: 20px !important;"> @lang('global.app_create') Reseller</h3>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('Select Pckg', 'Select Pckg', ['class' => 'control-label']) !!}
                    <select name="pckg" id="pckg" class="form-control" onchange="pckgChanging();" required="">
                      <option value="">Select Pacakge</option>

                      @foreach ($pckg as $val)
                        <option value= "{{ $val->id }}" >{{$val->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>

             <div class="row"  style="display: block">
                <div class="col-xs-12 form-group" style="width: 100%;">
                   <div class="col-md-12" id="pckg1" style="display: none"> 
                      <span class="col-md-3">Show Setting</span>
                      <span class="col-md-3">BlackList/WhiteList</span>
                      <span class="col-md-3">Add Delete Site</span>
                      <span class="col-md-3">Total No Of Domain 5</span>
                    </div>

                    <div class="col-md-12" id="pckg2" style="display: none"> 
                      <span class="col-md-2">Show Setting</span>
                      <span class="col-md-2">BlackList/WhiteList</span>
                      <span class="col-md-2">Add Delete Site</span>
                      <span class="col-md-2">Clear Cache</span>
                      <span class="col-md-2">Audit Trails</span>
                      <span class="col-md-4">Total No Of Domain 10</span>
                    </div>


                    <div class="col-md-12" id="pckg3" style="display: none"> 
                      <span class="col-md-2">Show Setting</span>
                      <span class="col-md-2">BlackList/WhiteList</span>
                      <span class="col-md-2">Add Delete Site</span>
                      <span class="col-md-2">Clear Cache</span>
                      <span class="col-md-2">Audit Trails</span>
                      <span class="col-md-2">Protected Pages</span>
                      <span class="col-md-2">Reports Settings</span>
                      <span class="col-md-4">Total No Of Domain 20</span>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('Description', 'Description*', ['class' => 'control-label']) !!}
                    {{-- <label class="form-control" for="domains">No of domains</label> --}}
                    <textarea name="description" id="" cols="20" rows="10" class="form-control" placeholder="Enter description here..."></textarea>
                </div>
            </div>

             <div  class="row">
                     <div class="col-xs-12 " style="width: 100%;">

    
        {!! Form::submit( 'Save' , ['class' => 'btn btn-lg btn-success']) !!}
        {!! Form::close() !!}

@stop

