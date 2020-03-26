 <?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;


class Package extends Model
{
	use HasRolesAndAbilities;
    protected $table = 'packages';
    protected $guarded = ['id'];


  	public function Sucuri() 
    {
        return $this->belongsTo('App\Sucuri');
    }

    public function pckg_detail()  
    {
        return $this->hasMany('App\pckg_detail','package_id');
    }

}
