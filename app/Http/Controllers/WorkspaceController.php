<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workspace;
use App\Detail;
use App\User;
use App\Invite;
use App\Todo;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workspaces= Workspace::get_all();
        if(!$workspaces->isEmpty()){
            //dd($workspaces);
            return view('item.workspacepage', compact('workspaces'));   
        }else{
            return redirect('/workspace/firstcreate');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function firstcreate()
    {
        return view('item.workspacefirstform');
    }
    public function create()
    {
        return view('item.workspaceform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $new_workspace = Workspace::create([
                "nama" => $request["nama"],
            ]);
            //DETAILS
            $new_workspace_detail = Detail::create([
                "workspace_id" => $new_workspace["id"],
                "user_id" => Auth::user()->id,
                "status" => "admin",
            ]);
    
            if($request->email){
                $emailArr = explode(',', $request->email);
                //dd($emailArr);
                $emailMulti  = [];
                foreach($emailArr as $strEmail){
                    
                    $user = User::where('email', $strEmail)->first();
                    if($user){
                        $add_new_member = Detail::create([
                        "workspace_id" => $new_workspace["id"],
                        "user_id" => $user["id"],
                        "status" => "member",
                    ]);
                    }else{
        
                        $invite = Invite::create([
                            'email' => $strEmail,
                            "workspace_id" => $new_workspace["id"],
                        
                        ]);
                       
                        // send the email
                        
                        $email = $strEmail;
                        $link ='http://127.0.0.1:8000/invite/'.$invite["id"] ;
            
                        Mail::send('item.invite', ['email' => $email,'link' => $link ], function ($message) use ($email)
                        {
                            $message->from('dailyplannerku@gmail.com', 'dailyplannerku');
                            $message->to($email);
                        });
                    }
                }
            }
        
       
       
        return redirect('/workspace');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $member = Workspace::get_by_id($id);
       // dd($member);
       $admin = $member->first(function($item) {
        return $item->id == Auth::user()->id;
    });
    
        $workspace = Workspace::find($id);
       
        return view('item.workspaceeditform', compact('workspace','member','admin'));
    }
    public function view($id){
        $member = Workspace::get_by_id($id);
        $workspace = Workspace::find($id);
        //dd($workspace);
        return view('item.workspaceviewform', compact('workspace','member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Workspace::destroy($id);
       // dd($deleted);
        return redirect()->route('workspace.index');
        
    }
    public function memberdelete($workspaceid, $memberid)
    {
        $deleted = Detail::where('workspace_id', $workspaceid)->where('user_id',$memberid)->delete();
        return redirect()->route('workspace.edit', $workspaceid);
    }
    public function memberadmin($workspaceid, $memberid)
    {   
        Detail::where('workspace_id',$workspaceid)->where('status','admin')
        ->update([
            "status" => "member",
        ]);
        Detail::where('workspace_id',$workspaceid)->where('user_id',$memberid)
        ->update([
            "status" => "admin",
        ]);
       
        return redirect()->route('workspace.index');
    }
    public function invite(Request $request){
        $workspaceid=$request->id;
        
        if($request->email){
            $emailArr = explode(',', $request->email);
            $emailMulti  = [];
            foreach($emailArr as $strEmail){
                
                $user = User::where('email', $strEmail)->first();
                
                if($user){
                    $detailexist = Detail::where('workspace_id',$workspaceid)->where('user_id',$user['id'])->first();
                    if(!$detailexist){
                        $add_new_member = Detail::create([
                            "workspace_id" => $workspaceid,
                            "user_id" => $user["id"],
                            "status" => "member",
                        ]);
                    }
                   
                }else{
                    $inviteexist = Invite::where('workspace_id',$workspaceid)->where('email',$strEmail)->first();
                    if(!$inviteexist){
             
                        $invite = Invite::create([
                            'email' => $strEmail,
                            "workspace_id" => $workspaceid,
                         
                        ]);
                     
                        // send the email
                        $email = $strEmail;
                        $link ='http://127.0.0.1:8000/invite/'.$invite["id"] ;
            
                        Mail::send('item.invite', ['email' => $email,'link' => $link ], function ($message) use ($email)
                        {
                            $message->from('dailyplannerku@gmail.com', 'dailyplannerku');
                            $message->to($email);
                        });
                    }
                   
                }
            }
        }
       
        return redirect()->route('workspace.edit', $workspaceid);
    }
    public function changename(Request $request){
        Workspace::where('id',$request['id'])
        ->update([
            "nama" => $request["nama"],
        ]);
        
        return redirect()->route('workspace.edit', $request['id']);
    }
    



    // public function index()
	// {
	// 	$workspaces = DB::table('details')
    //     ->select('details.*', 'workspaces.nama as workspace_nama', 'workspaces.id as workspace_id')
    //     ->join('workspaces', 'details.workspace_id', '=', 'workspaces.id')
    //     ->where('user_id',Auth::user()->id)
    //     ->get();
 
	// }
    // public function store(Request $request)
	// {
	// 	// insert data ke table pegawai
	// 	DB::table('pegawai')->insert([
	// 		'pegawai_nama' => $request->nama,
	// 		'pegawai_jabatan' => $request->jabatan,
	// 		'pegawai_umur' => $request->umur,
	// 		'pegawai_alamat' => $request->alamat
	// 	]);
	// 	// alihkan halaman ke halaman pegawai
	// 	return redirect('/pegawai');
 
	// }
    // public function update(Request $request)
	// {
	// 	// update data pegawai
	// 	DB::table('pegawai')->where('pegawai_id',$request->id)->update([
	// 		'pegawai_nama' => $request->nama,
	// 		'pegawai_jabatan' => $request->jabatan,
	// 		'pegawai_umur' => $request->umur,
	// 		'pegawai_alamat' => $request->alamat
	// 	]);
	// 	// alihkan halaman ke halaman pegawai
	// 	return redirect('/pegawai');
	// }
    // public function hapus($id)
	// {
	// 	// menghapus data pegawai berdasarkan id yang dipilih
	// 	DB::table('pegawai')->where('pegawai_id',$id)->delete();
		
	// 	// alihkan halaman ke halaman pegawai
	// 	return redirect('/pegawai');
	// }
}

