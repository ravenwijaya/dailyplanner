<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Workspace;
use App\Detail;
use App\Models\TodoModel;


use Illuminate\Support\Facades\Auth;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index($id)
    {
        $todo = Todo::where('status', 'todo')->where('workspace_id',$id)->get();
        $inprogress = Todo::where('status', 'inprogress')->where('workspace_id',$id)->get();
        $done = Todo::where('status', 'done')->where('workspace_id',$id)->get();
        return view('item.todoindex', compact('todo','inprogress','done','id'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         return view('item.todocreateform',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $new_todo = Todo::create([
            "kategori" => $request["kategori"],
            "judul" => $request["judul"],
            "isi" => $request["wysiwyg-editor"],
            "deadline" => $request["deadline"],
            "status" => $request["status"],
            "workspace_id" => $id,
        ]);
        return redirect()->route('todo.index', $id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('item.todoeditform', compact('todo'));
        
    }
    public function changestatus($id,$status){
        $todo = Todo::where('id',$id)->first();
        $todo->status = $status;
        $todo->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $to=Todo::where('id',$id)
        ->update([
            "kategori" => $request["kategori"],
            "judul" => $request["judul"],
            "isi" => $request["wysiwyg-editor"],
            "deadline" => $request["deadline"],
            "status" => $request["status"],
        ]);
        
        return redirect()->route('todo.index', $to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $deleted = Todo::destroy($id);
        return redirect()->route('todo.index', $deleted);
        
    }
}
