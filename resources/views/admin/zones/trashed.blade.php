@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app1')

@section('content')
    <style>
	i{
	margin-top: 12px !important;}
	</style>

        @if (!empty($audit))
  <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>{{$audit}} </strong>
  </div>
@endif
    
    <div class="panel panel-default" style="background: white;">
        <div class="panel-heading">
           <h2 style="font-size: 20px !important; padding: 10px;">AUDIT TRAILS</h2>
        </div>
		<div style = "width:100%;margin-top: 100px;">
		<div style = "float:left;padding: 50px; color: blue;"><h4 style="color: black;"><b>Current Monitoring View</b></h4> <hr>
		<br><br>
		<b>TOTAL REQUESTS</b> 
		<br>
		{{count($result)}}
		</div>
			<div id="donutchart" style="width: 500px; height: 250px;float: right; "></div>
		</div>
<div style = "clear: both;"></div>
<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Request Summary</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <p><b>Blocking Reason: </b> <span id="blocking" class="btn btn-primary"></span></p> <hr>
       <div class="row">
            <div class="col-sm-4">
                <p><b>Resource Path: </b></p>
            </div>
            <div class="col-sm-8"> 
                 <button style="border-top-left-radius:180px; border-bottom-left-radius:180px; background-color: green; color: white; border: none !important;">Whitelist</button><button style="background-color: red; color: white; border-top-right-radius:180px; border-bottom-right-radius:180px; border: none !important;">Blacklist</button>
                   <span id="path"></span>
            </div>
        </div>
<hr>
<div class="row">
            <div class="col-sm-4">
                <p><b>IP Address :</b></p>
            </div>
            <div class="col-sm-8"> 
                 <button style="border-top-left-radius:180px; border-bottom-left-radius:180px; background-color: green; color: white; border: none !important;">Whitelist</button><button style="background-color: red; color: white; border-top-right-radius:180px; border-bottom-right-radius:180px; border: none !important;">Blacklist</button>
                   <span id="ip_a"></span>
            </div>
        </div> <hr>
        <!-- <p><b>IP Address: </b><span class="btn btn-success">Whitelist</span><span class="btn btn-danger">Blacklist</span> <span id="ip_a"></span></p> <hr> -->
        <p><b>Reverse IP: </b> <span id="ip_r"></span></p> <hr>
        <p><b>Request Method: </b> <span id="request"></span></p> <hr>
        <p><b>HTTP Protocol: </b> <span id="http_p"></span></p> <hr>
        <p><b>HTTP Status: </b> <span id="http_s"></span></p> <hr>
        <p><b>HTTP Referer: </b> <span id="http_r"></span></p> <hr>
        <p><b>HTTP User-Agent: </b> <span id="http_u"></span></p> <hr>
        <p><b>Date/Time (GMT): </b> <span id="date"></span></p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<hr>

        <div class="panel-body table-responsive">
            <center>
           {!! Form::open(['action' => 'Admin\SucuriController@ok']) !!}
            
             <input type="hidden" name="id" value="<?=$id?>" />   
           
            <b>Choose Date: </b> <input style = "height: 30px;" type="date" name="date" class = "" />
                 <input type="submit" value="Search" class="btn btn-primary"  />
                 
           </form>
			<div style = "width: 90%;">
			
            <table class="table table-bordered table-striped {{ count($result) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>  
                        <th>Event</th>
                        <th>Path</th>
                        <th>IP</th>
                        <th>Date/Time</th>
                    </tr>
                </thead>
                
                <tbody>
				
				
				<?php $counterBlue = 0;?>
                

                @for($i = 0 ; $i < count($result) ; $i++)
                      <tr>
							<?php 
							
							if($result[$i]['sucuri_block_reason'] == "DDOS attempt blocked" ){
								$counterBlue++;
								$color = "style = 'background-color: #0C99DD;'";
								}			
								elseif($result[$i]['sucuri_block_reason'] == "Access denied - Site in lock down") {
									$color = "style = 'background-color: #FA9839;'";
								}
								elseif($result[$i]['sucuri_block_reason'] == "Evasion attempt denied") {
									$color = "style = 'background-color: #8EF969;'";
								}
								elseif($result[$i]['sucuri_block_reason'] == "Request not authorized") {
									$color = "style = 'background-color: #9E62D9'";
								}
								elseif($result[$i]['sucuri_block_reason'] == "Directory listing not authorized") {
									$color = "style = 'background-color: #B18957;'";
								}
								elseif($result[$i]['sucuri_block_reason'] == "Bad bot access denied") {
									$color = "style = 'background-color: #CE97C3'";
								}
								else {
									$color = "style = 'background-color: red'";
								}
							
							$blocked = count($result)- $counterBlue;
							$code = htmlentities($result[$i]['request_country_code']);
							
							?>
							
                                <td onclick="popupData('<?=$result[$i]['sucuri_block_reason']?>','<?=$result[$i]['resource_path']?>','<?=$result[$i]['remote_addr']?>','','<?=$result[$i]['request_method']?>','<?=$result[$i]['http_protocol']?>','<?=$result[$i]['http_status']?>','<?=$result[$i]['http_referer']?>','<?=$result[$i]['http_user_agent']?>','<?= $result[$i]['request_date'] ?> <?=$result[$i]['request_time'];?>');">
                                   <?php echo "<span class='flag-icon flag-icon-$code'></span>"; ?><button <?php echo $color; ?> type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal"> {{ $result[$i]['sucuri_block_reason'] }}</button></td>
                                <?php $str = ""; 
								if(strlen($result[$i]['resource_path']) > 31 ){
									 $str = 'style = "font-size: 10px !important;"';
								}else{
									$str = "";
								}
								?>
								<td <?php echo $str; ?> > <?php  echo $result[$i]['resource_path']; ?> </td>
                                <td> <p data-toggle="modal" data-target="#basicExampleModal" style="cursor: pointer;">{{ $result[$i]['remote_addr'] }} </p></td>
                                <td><p data-toggle="modal" data-target="#basicExampleModal" style="cursor: pointer;"> {{ $result[$i]['request_date'] }} {{  $result[$i]['request_time'] }}  {{ $result[$i]['request_timezone']}}</p></td>
                            </tr>
                            @endfor

                       
                </tbody>
            </table>
			</center>
			</div></center>
        </div>
    </div>

@stop

@section('javascript') 

@endsection



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    
    function popupData(blocking, path , ip , reserve , request , http_p,http_s ,http_r , http_u,date ) {
        // body...
        
        $('#blocking').text(blocking);
        $('#path').text(path);
        $('#ip_a').text(ip);
        $('#ip_r').text(reserve);
        $('#request').text(request);
        $('#http_p').text(http_p);
        $('#http_s').text(http_s);
        $('#http_r').text(http_r);
        $('#http_u').text(http_u);
        $('#date').text(date);
    }

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Allowed',     {{$counterBlue}}],
          ['Blocked',      {{$blocked}}]
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
