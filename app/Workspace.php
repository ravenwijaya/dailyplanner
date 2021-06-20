<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Workspace extends Model
{
    protected $fillable = ['nama'];
    public static function get_all(){
        $workspaces = DB::table('details')
        ->select('details.*', 'workspaces.nama as workspace_nama', 'workspaces.id as workspace_id')
        ->join('workspaces', 'details.workspace_id', '=', 'workspaces.id')
        ->where('user_id',Auth::user()->id)
        ->get();
        //dd($workspaces);
        return $workspaces;
      }
      public static function get_by_id($id){
        $member = DB::table('details')
        ->select('users.id','users.name','details.status')
        ->join('workspaces', 'details.workspace_id', '=', 'workspaces.id')
        ->join('users', 'details.user_id', '=', 'users.id')
        ->where('details.workspace_id',$id)
        ->get();
     // dd($member);
        return $member;
      }
    public static function exist_details_users($email,$workspace_id){
        $detail=DB::table('details')
        ->select('details.*', 'users.email as user_email')
        ->join('users', 'details.user_id', '=', 'users.id')
        ->where('workspace_id',$workspace_id)
        ->where('users.email',$email)
        ->get();
       // dd($detail);
          return $detail;
      }
    public static function exist_invites_users($email,$workspace_id){
        $detail=DB::table('invites')
        ->select('invites.*', 'users.email as user_email')
        ->join('users', 'invites.email', '=', 'users.email')
        ->where('workspace_id',$workspace_id)
        ->where('users.email',$email)
        ->get();
        //dd($detail);
          return $detail;
      }
}
