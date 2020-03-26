<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Sucuri;
use App\Branding;
use App\Cfaccount;
use App\Spaccount;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $us = User::where('owner', 1)->get();
        $users = array();
        // dd($users);
        foreach ($us as $key => $value) {
            # code...
            if($value->branding !=null){
                $users[]= $value;  
            }
        }
        
        //$users = User::whereIs('organization')->where('owner',auth()->user()->id)->with('roles')->get();
        
       
        
        return view('admin.users.index', compact('users'));
    }
    public function manage(){
    $id = auth()->user()->id;

        $user  = DB::table('brandings')->where('user_id',$id)->get();
 
        // dd($user[0]);

return view('admin.users.editResellar', compact('user'));
}

    public function listResellers()
    { 
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        

        $us = User::where('owner', 1)->get();
        $users = array();
        // dd($users);
        foreach ($us as $key => $value) {
            # code...
            if($value->branding !=null){
                $users[]= $value;  
            }
        }
        
        return view('admin.users.resellers', compact('users'));
    }
 
    function email($name , $to , $from , $subject , $msg){
        
$to_email = $to;
$subject = $domain;
$message = $subject;
$headers = 'From: '.$from;
mail($to_email,$subject,$message,$headers);

        // $to = $to;
            
        //     $subject = 'Website Change Reqest';
            
        //     $message = '<html><body>';
        //     // $message .= '<img src="http://css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
        //     $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        //     $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $domain . "</td></tr>";
        //     // $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['req-email']) . "</td></tr>";
        //     $message .= "<tr><td><strong>Message:</strong> </td><td>" . $msg . "</td></tr>";
        //     // $message .= "<tr><td><strong>Urgency:</strong> </td><td>" . strip_tags($_POST['urgency']) . "</td></tr>";
        //     // $message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>" . $_POST['URL-main'] . "</td></tr>";
        //     // $addURLS = $_POST['addURLS'];
        //     // if (($addURLS) != '') {
        //     //     $message .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . strip_tags($addURLS) . "</td></tr>";
        //     // }
        //     // $curText = htmlentities($_POST['curText']);           
        //     // if (($curText) != '') {
        //     //     $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
        //     // }
        //     // $message .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['newText']) . "</td></tr>";
        //     $message .= "</table>";
        //     $message .= "</body></html>";
            
            
        //     $headers = "From: " . $from;
        //     // $headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
        //     $headers .= "MIME-Version: 1.0\r\n";
        //     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        //     if (mail($to, $subject, $message, $headers)) {
        //       echo 'Your message has been sent.';
        //     } else {
        //       echo 'There was a problem sending the email.';
        //     }
    }

    public function delete(Request $req){
    $users  = DB::table('sucuri_user')->where('active','0')->get();

      $name = "";
      $to = "bilal.shaikh@s4scorp.com";
      $from = "test@gmail.com";
      $subject = "Delete Doamin Request";
      $msg = "Your Delete Domain Request Farware to admin when admin is approved so domain is deleted";
// dd("ok ok");
      // email($name , $to , $from , $subject , $msg);

   // email('Bilal' , "bilal.shaikh@s4scorp.com" , 'test@gmail.cmo' , 'zyx.com' , "hello dear ");

        return view('admin.users.delete', compact('users'));
}

    public function rejectDomain(Request $req){
        // dd($req->id); 
         DB::table('sucuri_user')->where('id',$req->id)->update(['active' => '2' ]);
        $users = DB::table('sucuri_user')->where('s_key' , '' )->where('active' , '0')->get();
         return view('admin.users.pending', compact('users')); 

    }

public function updateLogo(Request $req){

        DB::table('brandings')->where('id',$req->id)->update([ 'logo' => '' ]);
        $user  = DB::table('brandings')->where('user_id',$id)->get();
        return view('admin.users.edit', compact('users'));              
}

public function pending()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        } 
        $users = DB::table('sucuri_user')->where('s_key' , '' )->get();
        return view('admin.users.pending', compact('users'));
    }

 

 public function editDomain(Request $req){
    $users = DB::table('sucuri_user')->where('id', $req->id)->get();
    return view('admin.zones.update', compact('users'));   
 } 


 public function updatemanage(Request $req)
{
    # code... 
    $id = auth()->user()->id;
// dd($req->image);
        

         $imageName = time().'.'.request()->image->getClientOriginalExtension();

         request()->image->move(public_path('images'), $imageName);

            DB::table('brandings')->where('id',$req->id)->update(['name' => $req->name , 'customdomain' => $req->custom_domain , 'sp' => $req->sp, 'logo' => $imageName,]);
            
        $user  = DB::table('brandings')->where('user_id',$id)->get();

    return view('admin.users.editResellar', compact('user')); 

}

 public function updateDomain(Request $req)
{
    $user = DB::table('sucuri_user')->where('id',$req->id)->update(['s_key' => $req->s_key]);
    $users = DB::table('sucuri_user')->where('id', $req->id)->get();

    $data = "updated";
    return view('admin.zones.update', compact('users','data'));  
}

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        


        $roles = Role::get()->pluck('name', 'name');

        $abilities = Role::where("name","org")->first()->getAbilities();

        return view('admin.users.create', compact('roles','abilities'));
    }

     public function createReseller()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get();


        $cfAccounts = User::findOrFail(auth()->user()->id)->cfaccount;

        $spAccounts = User::findOrFail(auth()->user()->id)->spaccount;

        $abilities = Role::first()->getAbilities()->take('500');



        return view('admin.users.createReseller', compact('roles','abilities','spAccounts','cfAccounts'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::create($request->all());

       $user->save();


        foreach ($request->input('abilities') as $ability) {
             
             $user->allow($ability);
        }
        

        // foreach ($request->input('roles') as $role) {
             $user->assign('organization');
        // }

        return redirect()->route('admin.users.index');
    }
  public function show (Request $req){


     if($req->logoID > 0 ){
       // echo DB::table('brandings')->where('id',$req->logoID)->update(['logo' => ' ',]);
       DB::update("update brandings set logo = null where id = ".$req->logoID);
    }
     else {
        

        DB::update("update users set name = '".$req->name."' where id = ".$req->userID);
        // dd("die");
        DB::table('brandings')->where('id',$req->id)->update(['name' => $req->name , 'cf' => $req->cf ,'customdomain' => $req->custom_domain , 'sp' => $req->sp, 'Show_Setting' => $req->Show_Setting , 'BlackList' => $req->BlackList, 'Add_Delete_Site' => $req->Add_Delete_Site , 'Clear_Cache' => $req->Clear_Cache , 'Audit_Trails' => $req->Audit_Trails , 'Protected_Pages' => $req->Protected_Pages , 'Reports_Settings' => $req->Reports_Settings ,]);
     }   

        return redirect()->route('admin.listResellers');
        // edit($req->userID);//////
    }
 public function storeReseller(StoreUsersRequest $request)
    {
        if (! Gate::allows('resellers_manage')) {
            return abort(401);
        }


         // dd("ok");
       
        $user = User::create($request->except('cfaccount','spaccount','cf','sp','Show_Setting','BlackList' ,'Add_Delete_Site','Clear_Cache','Audit_Trails','Protected_Pages','Reports_Settings'));

        



        // foreach ($request->input('abilities') as $ability) {
             
        //      $user->allow($ability);
        // }


        $cfaccount=cfaccount::find($request->input('cfaccount'));
        $spaccount=spaccount::find($request->input('spaccount'));

        // $user->allow('access',$cfaccount);
        // $user->allow('access',$spaccount);


        // foreach ($request->input('roles') as $role) {
             $user->assign('reseller');
        // }

             //$url = strtolower(str_random(5))."_".str_slug($user->name).".panel.blockdos.net";
             
if($request->input('pckg') == "Pacakge 1"){
    Branding::create([
                'name' => $request->input('name'),
                'url'  => "",
                'email' => $request->input('email'),
                'temp_url' => '',
                'logo' => '',
                'user_id' => $user->id,
                'cf' => '5',
                'sp' => $request->input('description'),
                'Show_Setting' => '1',
                'BlackList' => '1',
                'Add_Delete_Site' => '1',
                
             ]);
}
else if($request->input('pckg') == "Pacakge 2"){
    Branding::create([
                'name' => $request->input('name'),
                'url'  => "",
                'email' => $request->input('email'),
                'temp_url' => '',
                'logo' => '',
                'user_id' => $user->id,
                'cf' => '10',
                'sp' => $request->input('description'),
                'Show_Setting' => '1',
                'BlackList' => '1',
                'Add_Delete_Site' => '1',
                'Clear_Cache' => '1',
                'Audit_Trails' => '1',
                
             ]);
}
 else if($request->input('pckg') == "Pacakge 3"){
    Branding::create([
                'name' => $request->input('name'),
                'url'  => "",
                'email' => $request->input('email'),
                'temp_url' => '',
                'logo' => '',
                'user_id' => $user->id,
                'cf' => '20',
                'sp' => $request->input('description'),
                'Show_Setting' =>'1',
                'BlackList' => '1',
                'Add_Delete_Site' => '1',
                'Clear_Cache' => '1',
                'Audit_Trails' => '1',
                'Protected_Pages' => '1',
                'Reports_Settings' => '1',
                ]);
}
else{
    Branding::create([
                'name' => $request->input('name'),
                'url'  => "",
                'email' => $request->input('email'),
                'temp_url' => '',
                'logo' => '',
                'user_id' => $user->id,
                'cf' => $request->input('cfAllowed'),
                'sp' => $request->input('description'),
                'Show_Setting' => $request->input('Show_Setting'),
                'BlackList' => $request->input('BlackList'),
                'Add_Delete_Site' => $request->input('Add_Delete_Site'),
                'Clear_Cache' => $request->input('Clear_Cache'),
                'Audit_Trails' => $request->input('Audit_Trails'),
                'Protected_Pages' => $request->input('Protected_Pages'),
                'Reports_Settings' => $request->input('Reports_Settings'),
             ]);
}            

        return redirect()->route('admin.listResellers');
    }

    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (! Gate::allows('users_manage')) {
            return abort(401);
        }


        $user = User::findOrFail($id);
        $branding = $user->branding;

        if ( $user->owner!= auth()->user()->id) {
            return abort(401);
        }

        $roles = Role::get()->pluck('name', 'name');

        // $abilities = Ability::get()->pluck('name', 'name');
        // 
         $abilities = Role::where("name","org")->first()->getAbilities();

        // foreach ($abilities as $ability) {
        //     # code...
        //     # 
        //     echo($ability->name);
        // }
        // die();


       

        return view('admin.users.edit', compact('user', 'roles','abilities','branding'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    { 
        // dd("ok");
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        if ( $user->owner!= auth()->user()->id) {
            return abort(401);
        }
        // dd($request->all());

        $updated_data  = array('_method' => 'PUT',
                                '_token' => $request->_token,
                                'name' => $request->name,
                                'email'=> $request->email,
                                'password' => $request->password);

        $user->update($updated_data);

        if(isset($request->password))
        {
             //dd($request->password);
            $user->password_updated = 1; 
             $user->save();   
        }
// dd($user->id);
$show =0;
    $black=0;
    $add=0;
    $Cache=0;
    $audit=0;
    $Protected =0;
    $Reports = 0;
        if($request->Show_Setting){
            $show = 1;
        }
        if($request->BlackList){
            $black = 1;
        }
        if($request->Add_Delete_Site){
            $add = 1;
        }
        if($request->Clear_Cache){
            $Cache = 1;
        }
        if($request->Audit_Trails){
            $audit = 1;
        }
        if($request->Protected_Pages){
            $Protected = 1;
        }
        if($request->Reports_Settings){
            $Reports = 1;
        }

        DB::table('brandings')
            ->where('user_id', $user->id)
            ->update(['cf' => $request->cf , 'sp' => $request->sp , 'Show_Setting' => $show  , 'BlackList' => $black , 'Add_Delete_Site' => $add , 'Clear_Cache' => $Cache , 'Audit_Trails' => $audit , 'Protected_Pages' => $Protected , 'Reports_Settings' => $Reports ]);
       
        // dd($user->can("reseller_access"));
       foreach ($user->getAbilities() as $ability) {
            $user->forbid($ability->name);
        }

        //dd($request->input('abilities'));
        //

        if($request->input('abilities')!=null)
        {
            foreach ($request->input('abilities') as $ability) {
                 $user->unforbid($ability);
                 $user->allow($ability);
            }
             \Bouncer::refreshFor($user);
        }

        


        return redirect()->route('admin.listResellers');
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




public function deleteUsers( Request $req)
    { 
         DB::delete('delete from sucuri_user where id = ?',[$req->id]);
         $users = DB::table('sucuri_user')->where('active' , '0')->get();
       return view('admin.users.delete', compact('users'));

    } 

    public function destroy($id , Request $req)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }


        // dd($id.  "   " .$req->resller);

        $user = User::findOrFail($id);
         if ( $user->owner!= auth()->user()->id) {
            return abort(401);
        }

        if(isset($req->resller)){


         DB::delete('delete from sucuri_user where id = ?',[$id]);
         $users = DB::table('sucuri_user')->where('id' , $id)->get();
        


       return view('admin.users.delete', compact('users'));

            

}
else{
        DB::delete('delete from  brandings where user_id = ?',[$id]);
 
        DB::delete('delete from  users where id = ?',[$id]);
        // DB::delete('delete from  sucuri_user where id = ?',[$id]);

                return redirect()->route('admin.listResellers');
}
        // if($user->zone->count()>0)
        // {
        //     dd("user has domains");
        // }
        // else
        // {
        //     // dd("user does not have domains");
        //     $user->delete();    
        // }
        

        // return redirect()->route('admin.listResellers');
        
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {

                 if ( $entry->owner== auth()->user()->id) {
                     $entry->delete();
                }

               
            }
        }
    }


    public function listZones(User $user)
    {
        if ( $user->owner!= auth()->user()->id) {
            return abort(401);
        }
        
        $zones=$user->zone;
        return view('admin.users.zones', compact('zones','user'));

        
    }



}
