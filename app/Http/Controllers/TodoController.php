<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Auth;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        $todo = Todo::where('status', 'todo')->where('user_id',Auth::user()->id)->get();
        $inprogress = Todo::where('status', 'inprogress')->where('user_id',Auth::user()->id)->get();
        $ongoing = Todo::where('status', 'ongoing')->where('user_id',Auth::user()->id)->get();
        $finished = Todo::where('status', 'finished')->where('user_id',Auth::user()->id)->get();
        // dd($todos);
        return view('item.index', compact('todo','inprogress','ongoing','finished'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        // $aa=$users->find(1);
        //  // $subset = $users->map(function ($user) {
        //  //     return collect($user->toArray())
        //  //         ->only(['id', 'name', 'email'])
        //  //         ->all();
        //  // });
        // //dd( $aa);
         return view('item.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_todo = Todo::create([
            "kategori" => $request["kategori"],
            "judul" => $request["judul"],
            "isi" => $request["wysiwyg-editor"],
            "deadline" => $request["deadline"],
            "status" => $request["status"],
            "user_id" => $request["user_id"],
           
        ]);
        return redirect('/todo');
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
        return view('item.editform', compact('todo'));
        
    }
    public function changestatus($id,$status){
        $todo = Todo::where('id',$id)->first();
        $todo->status = $status;
//dd($todo);
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
        // dd($request->all());
        
        Todo::where('id',$id)
        ->update([
            "kategori" => $request["kategori"],
            "judul" => $request["judul"],
            "isi" => $request["wysiwyg-editor"],
            "deadline" => $request["deadline"],
            "status" => $request["status"],
        ]);
        return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $deleted = Todo::destroy($id);
        return redirect('/todo');
    }
}
