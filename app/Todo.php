<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
class Todo extends Model
{   
    protected $table="todos";

    protected $guarded = [];
    public static function get_all(){
        $workspaces = DB::table('details')
        ->select('details.*', 'workspaces.nama as workspace_nama', 'workspaces.id as workspace_id')
        ->join('workspaces', 'details.id', '=', 'workspaces.id')
        ->where('user_id',Auth::user()->id)
        ->get();
        return $workspaces;
      }
    public function users() {
        return $this->belongsTo('App\User');
    }
}
