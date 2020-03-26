@extends('layouts.app3')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}

    <div class="panel panel-default" style="background: white">
        <div class="panel-heading">
           
        </div>

        <div class="panel-body" style="width: 100%;">
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
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('Domain', 'No of Domain', ['class' => 'control-label']) !!}
                    {!! Form::text('cf',  $branding->cf,['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('sp',  $branding->sp,['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
<?php  
    $show ="";
    $black="";
    $add="";
    $Cache="";
    $audit="";
    $Protected ="";
    $Reports = "";
    if( $branding->Show_Setting !=null){
        $show ="checked";
    }
    if( $branding->BlackList !=null){
        $black ="checked";
    }
    if( $branding->Add_Delete_Site !=null){
        $add ="checked";
    }
    if( $branding->Clear_Cache !=null){
        $Cache ="checked";
    }
    if( $branding->Audit_Trails !=null){
        $audit ="checked";
    }
    if( $branding->Protected_Pages !=null){
        $Protected ="checked";
    }
    if( $branding->Reports_Settings !=null){
        $Reports ="checked";
    }

?>
              <div  class="row">
                     <div class="col-xs-12 ">
                       
<table class="table table-bordered" style="width: 100%">
<tr>
<td>
Show Setting 
</td>
<td>
  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Show_Setting"  <?=$show?> >
  

</td>

<td>
BlackList/WhiteList 
</td>
<td>
  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="BlackList" <?=$black?> >

</td>



<td>
Add Delete Site 
</td><td>
  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Add_Delete_Site" <?=$add?> >

</td>

<td>
Clear Cache 
</td><td>
  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Clear_Cache" <?=$Cache?> >

</td>
</tr>

<tr>

<td>
Audit Trails 
</td>
<td>
  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Audit_Trails" <?=$audit?> >
</td>



<td>
Protected Pages 
</td><td>
  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Protected_Pages" <?=$Protected?> >

</td>
<td>
Reports Settings 
</td>
<td>
  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger" data-on="Yes" data-off="No" value="1" name="Reports_Settings" <?=$Reports?> >
</td>
<td colspan="2">&nbsp;</td>

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

@stop

