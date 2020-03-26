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
                      <option value="Pacakge 1">Pacakge 1</option>
                      <option value="Pacakge 2">Pacakge 2</option>
                      <option value="Pacakge 3">Pacakge 3</option>
                      <option value="Custom">Custom</option>
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

            <div class="row" id="numberDomain" style="display: none">
                <div class="col-xs-12 form-group" style="width: 100%;">
                    {!! Form::label('domains', 'No. of Domains*', ['class' => 'control-label']) !!}
                    {{-- <label class="form-control" for="domains">No of domains</label> --}}
                    <input type="number" name="cfAllowed" placeholder="Enter domains here..." class="form-control">
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

<table >
                       
  <table id="pckg_list"  class="table table-bordered" style="display: none; width: 100%">
    <tr>
    <td>
    Show Setting 
    </td>
    <td>
      <label class="switch">
        <input type="checkbox" value="1" checked name="Show_Setting">
        <span class="slider round"></span>
    </label>
      {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Show_Setting"   > --}}
      
    
    </td>
    
    <td>
    BlackList/WhiteList 
    </td>
    <td>
      <label class="switch">
        <input type="checkbox" value="1" checked name="BlackList">
        <span class="slider round"></span>
    </label>
      {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="BlackList"  > --}}
    
    </td>
    
    
    
    <td>
    Add Delete Site 
    </td><td>
      <label class="switch">
        <input type="checkbox" value="1" checked name="Add_Delete_Site">
        <span class="slider round"></span>
    </label>
      {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Add_Delete_Site" > --}}
    
    </td>
    
    <td>
    Clear Cache 
    </td><td>
      <label class="switch">
        <input type="checkbox" value="1" checked name="Clear_Cache">
        <span class="slider round"></span>
    </label>
      {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Clear_Cache" > --}}
    
    </td>
    </tr>
    
    <tr>
    
    <td>
    Audit Trails 
    </td>
    <td>
      <label class="switch">
        <input type="checkbox" value="1" checked name="Audit_Trails">
        <span class="slider round"></span>
    </label>
      {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Audit_Trails" > --}}
    </td>
    
    
    
    <td>
    Protected Pages 
    </td><td>
      <label class="switch">
        <input type="checkbox" value="1" checked name="Protected_Pages">
        <span class="slider round"></span>
    </label>
      {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Protected_Pages" > --}}
    
    </td>
    <td>
    Reports Settings 
    </td>
    <td>
      <label class="switch">
        <input type="checkbox"  value="1" checked name="Reports_Settings">
        <span class="slider round"></span>
    </label>

      {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Reports_Settings" > --}}
    </td>
    
    </tr>
                        <p class="help-block"></p>
                        @if($errors->has('abilities'))
                            <p class="help-block">
                                {{ $errors->first('abilities') }}
                            </p>
                        @endif
                    </div>
                </div>
                
    
                
            </div>
        </div>
        </table>
        
        <br>
        <br>
        {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-lg btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
    </div>
    </div>
    </div>
    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
<script type="text/javascript">
  function pckgChanging(){
      var value = document.getElementById('pckg').value;
      if(value == "Custom"){
         $('#numberDomain').css('display' , 'block');
         $('#pckg_list').css('display' , 'block');
      }

      else {
          $('#pckg_list').css('display' , 'none');
          $('#numberDomain').css('display' , 'none');
      }
     
     if(value == "Pacakge 1"){
          $('#pckg1').css('display','block');
          $('#pckg2').css('display','none');
          $('#pckg3').css('display','none');
     }
     else if(value == "Pacakge 2"){
          $('#pckg1').css('display','none');
          $('#pckg2').css('display','block');
          $('#pckg3').css('display','none');
     } 
     else if(value == "Pacakge 3"){
          $('#pckg1').css('display','none');
          $('#pckg2').css('display','none');
          $('#pckg3').css('display','block');
     }   
     else{
        $('#pckg1').css('display','none');
          $('#pckg2').css('display','none');
          $('#pckg3').css('display','none');
     }
  }
</script>

@stop

