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
    <h3 class="page-title">Pacakges</h3>
    <p>
        <a href="{{ route('admin.resellers.createPckg') }}" class="btn btn-success btn-lg">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default" style="background: white;">
        <div class="panel-heading">
            {{-- @lang('global.app_list') --}}
        </div>

        <div class="panel-body table-responsive">
           
            
            <table class="table table-bordered table-striped {{ count($pckg) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>

                        <th>@lang('global.users.fields.name')</th>
                        <th>Price</th>
                        <th>description</th>
                        <th>Domains</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead> 
                
                <tbody>
                    @if (count($pckg) > 0)
                    
                     @foreach ($pckg as $value => $val  )

                            <tr data-entry-id="{{ $val->id }}">
                        

                                <td>{{ $val->name }}</td>
                                <td>{{ $val->price }}</td>
                                 <td>{{ $val->description }}</td>
                                 <td>{{ $val->domains }}</td>
                                 
                               
                                <td>
                                    <div style="">
                                    
                                    <a href="{{ route('admin.pacakge.edit',[$val->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a> 
                                   
                                  <form action= " {{ route('admin.pacakge.destroy') }}"  method="get" onsubmit="return confirmMsg();">
                                        <input type="hidden" name="id" value="{{ $val->id }}">
                                        <input type="submit"  value= "Delete" class="btn btn-xs btn-danger">
                                    </form>
                                   
                                </div>
                                </td>

                            </tr>
                            
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop


