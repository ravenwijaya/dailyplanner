<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;
class InviteController extends Controller
{

    public function invite($token)
{  
    $invite = Invite::where('token', $token)->first();

    $email=$invite['email'];
    return view('item.register',compact('token','email'));
}
public function process()
{
    // process the form submission and send the invite by email
}
public function accept($token)
{
    // here we'll look up the user by the token sent provided in the URL
}

}
