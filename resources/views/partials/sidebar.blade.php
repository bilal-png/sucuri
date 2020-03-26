@inject('request', 'Illuminate\Http\Request')

<aside class="main-sidebar" id = "sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" id = "sidebar">
        <center>
            <div class="user-box" id = "sidebar">
                <div class="user-img">
                    
                   <a href="{{ url('/') }}" class="user-edit"><img style="width: 150px; " src="{{asset('images/bd-logo-white.png')}}" alt="user-image" ></a>
                </div>
        <br>
                <h5><a href="javascript: void(0);">Nowak Helme</a> </h5>
                <p class="text-muted mb-0"><small>Admin Head</small></p>
                <br>
                <a  class=" notify-item">
                    <i class="fe-settings"></i>
                 </a> &nbsp;
                 <a href="{{ url('logout') }}" class="notify-item">
                    <i class="mdi mdi-power"></i>
                </a>
            </div>
        </center>
        
        <hr>
        <br>
        <br>
        <ul class="sidebar-menu" style="color: black">

            <li class=" {{ $request->segment(2) == 'home' ? 'active' : '' }}" style="color: black">
                <a id="anchor" href="{{ url('/') }}" style="color: black">
                    <i class="mdi mdi-view-dashboard"></i> 
                    <span class="title">@lang('global.app_dashboard') </span>
                </a>
            </li>
            @if(auth()->user()->id==1)
             <li class="{{ $request->segment(2) == 'resellers' ? 'active' : '' }}" style="color: black">
                <a style="color: black" id="anchor" href="{{ route('admin.listResellers') }}" style="color: black">
                    <i class="fa fa-users"></i>
                    <span class="title">Resellers</span>
                    <span class="pull-right-container">
                       
                    </span>
                </a>
            </li>

            <li class="{{ $request->segment(2) == 'pending' ? 'active' : '' }}" style="color: black">
                <a id="anchor" href="{{ route('admin.pending') }}" style="color: black">
                    <i class="fa fa-users"></i>
                    <span class="title">Pending Request</span>
                    <span class="pull-right-container"></span>
                </a> 
                
            </li>
            <li class="{{ $request->segment(2) == 'delete' ? 'active' : '' }}" style="color: black">
                <a id="anchor" href="{{ route('admin.delete') }}" style="color: black">
                    <i class="fa fa-users"></i>
                    <span class="title">Delete Request</span>
                    <span class="pull-right-container"></span>
                </a> 
                
            </li>
            
            <li class="{{ $request->segment(2) == 'pacakge' ? 'active' : '' }}" style="color: black">
                <a id="anchor" href="{{ route('admin.pacakge') }}" style="color: black">
                    <i class="fa fa-users"></i>
                    <span class="title">Packages</span>
                    <span class="pull-right-container"></span>
                </a> 
                
            </li>
            @endif
            

            
            <li class="{{ $request->segment(2) == 'zones' ? 'active' : '' }}">
                        <a id="anchor" href="{{ route('admin.zones.index') }}" id="anchor" style="color: black">
                            <i class="fa fa-user"></i>
                            <span class="title">
                               All Sucuri Accounts
                            </span>
                        </a>
                </li>



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a id="anchor" href="{{ route('auth.change_password') }}"  style="color: black">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a id="anchor" href="{{ url('logout') }}" style="color: black">
                    <i class="fe-log-out"></i> &nbsp;
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
           <li>
               <center>

                <table>
                    <tr>
                        <td>
                            <label for="" style="padding: 10px">DARK MODE:</label>
                        </td>
                        <td> 
                            <label class="switch">
                                <input type="checkbox"  onchange="changeHeadingBg('black');">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                </table>
                  {{-- <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger"   onchange="changeHeadingBg('black');"> --}}

                {{-- <button type="button" class="btn btn-danger" onclick="changeHeadingBg('black');">Turn To Dark Mode</button> --}}
               </center>
            </li>
        </ul>
        <script>
            
           // Function to change webpage background color
           function changeHeadingBg(color){
                var element = document.getElementById("sidebar");
                element.classList.toggle("dark-mode");
             // document.getElementById("sidebar").style.background = color;
            }
            </script>

    </section>
</aside>

