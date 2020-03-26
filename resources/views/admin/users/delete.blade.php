@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    
<script type="text/javascript">
    
    function confirmMsg(){
        var msg = confirm("are you sure");

        if(msg){
            return true; 
        }
        else{
            return false;
        } 

    }

</script>

    <h3 class="page-title">Delete Domains</h3>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('global.users.fields.name')</th>
                        <th>URLsss</th>
                        <th>API</th>
                        <th>&nbsp;</th> 

                    </tr>
                </thead>
                
                <tbody>
                    
                    
                        @foreach ($users as $user => $val)

                            <tr data-entry-id="{{ $val->id }}">
                                <td></td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->url }}</td>
                                 <td>{{ $val->a_key }}</td>
                                
                               
                                <td>
                                    <div style=""> 
                                    <form action= " {{ route('admin.delete1') }}"  method="get" onsubmit="return confirmMsg();">
                                        <input type="hidden" name="id" value="{{ $val->id }}">
                                        <input type="submit"  value= "Delete" class="btn btn-xs btn-danger">
                                    </form>
                                </div>
                                </td>

                            </tr>
                            
                        @endforeach
                    
                        
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection