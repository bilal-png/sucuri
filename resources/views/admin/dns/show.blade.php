@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app1')

@section('content')


<?php

$results=json_decode($ok);
//$messages = $result->messages;
 //print_r($result->output);  ?>
 @if(isset($message))
    <div class="alert alert-danger" role="alert">
        {{  $message }}
		<meta http-equiv = "refresh" content = "2; url = /admin/{{$request->id}}/dns" />

    </div>
    @endif
            {{-- For Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
<div class="row" style="background: white;">
                <div class="col-xs-12" style="width: 100%;">
                    <h2 style="font-size: 20px !important; padding: 10px;">Whitelist/Blacklist IP </h2>
                    <div class="panel panel-success">
                        <div class="panel-heading" style="padding: 10px;"><h3>{{$results->output->domain}}</h3></div>
                        <div class="panel-body" >

                            
                            <h4>IPs</h4>
                            <table class="table table-bordered">
            <tbody>
                <tr>
                    
                    <td><b>White Listed IP Address:</b></td>

                    <td>
                        @foreach ($results->output->whitelist_list as $result) <a href="white/{{ $result }}"> <b>  {{ print_r($result)}}</b></a> <br>  @endforeach
                    </td>   
                </tr>

                <tr>
                
                    <td><b>Black Listed IP Address:</b> </td>

                    <td>
                        @foreach ($results->output->blacklist_list as $result) <a href="black/{{ $result }}"> <b>  {{ print_r($result)}}</b></a> <br> @endforeach 
                   </td>
                </tr>
                

          

           
            </tbody>
        </table>

        

                        </div>
                    </div>
                </div>
            </div>









@stop

@section('javascript') 
    
@endsection
