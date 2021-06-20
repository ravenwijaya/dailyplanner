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
        
        //WORKSPACE
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
    
                    do {
                        $token = Str::random(16);;
                    } 
                    while (Invite::where('token', $token)->first());
                    
                    $invite = Invite::create([
                        'email' => $strEmail,
                        "workspace_id" => $new_workspace["id"],
                        'token' => $token
                    ]);
                    // send the email
                    $email = $request->get('email');
                    $link ='http://127.0.0.1:8000/invite/'.$token ;
        
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
    {   $member = Workspace::get_by_id($id);
        $workspace = Workspace::find($id);
        //dd($workspace);
        return view('item.workspaceeditform', compact('workspace','member'));
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
    public function invite(Request $request){
        //dd($request);
        
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
                        do {
                            $token = Str::random(16);;
                        } 
                        while (Invite::where('token', $token)->first());
                        
                        $invite = Invite::create([
                            'email' => $strEmail,
                            "workspace_id" => $workspaceid,
                            'token' => $token
                        ]);
                        // send the email
                        $email = $request->get('email');
                        $link ='http://127.0.0.1:8000/invite/'.$token ;
            
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
    
}

