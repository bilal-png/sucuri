@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app1')

@section('content')



<?php
$result=json_decode($ok);
$id=json_decode($id);

   ?>
     @if(isset($message))
    <div class="alert alert-danger" role="alert">
        {{  $message }}
		<meta http-equiv = "refresh" content = "2; url = /admin/{{$id}}/firewall" />
    </div>
    @endif

<div class="row" style="background: white;">

 

               
    <div class="col-xs-12" style="width: 100%">
        <form class="form-inline" method="get" action="protect/ss">
            <div class="container-fluid">
			<br><br>
                  <div class="form-group">
                    <label for="url">ADD NEW PROTECTED PAGE:</label>
                    <input type="text" class="form-control" id="url" placeholder="e.g. /wp-login.php or /admin.php" name="url" style="width: 500px;">
                    <button type="submit" class="btn btn-success" name="submit">PROTECT PAGE</button>
                  
                </div>
                </form>
              </div>               

                    <h2 style="padding-left: 10px;">Protected Pages</h2>@foreach ($result->output as $key)
                    <div class="panel panel-success"> 
                        <div class="panel-heading"><h3 style="font-size: 20px !important; padding: 10px;">{{ $key->path }} </h3></div>
                        <div class="panel-body">

                            
                            <h4>Details</h4>
                            <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><b>Path:</b> {{ $key->path }}  </td>
                    <td><b>Password :</b>{{ $key->password }}  </td>
                    
                    

                </tr>
                <tr>
                
                    <td><b>State:</b>{{ $key->state }}</td>
                    <td><b>Provisioning URI:</b> </td>
                </tr>

                <tr>
                
                    <td><b>QR Code Image:</b></td>
                    <td><a href="{{ $key->path }}"><button  onclick="myFunction()" class="btn btn-danger">DELETE FROM PROTECTED PAGES</button></a> 
                    
                </td>
                    

          

           
            </tbody>
        </table>

        

                        </div>
                    </div>
                    @endforeach</div>
            </div>









@stop

@section('javascript') 

@endsection