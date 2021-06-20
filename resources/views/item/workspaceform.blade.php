@extends('custom.master-nav')

@section('content')

<div class="form-popup" id="myForm">
<a href="/workspace" class="btn-back">Back</a>
    <h1 class="form-title">New Workspace</h1>
    <!-- <a href="{{ url()->previous() }}">Back</a> -->
    <form role="form" action="/workspace/create" method="POST" class="form-container">
   
        @csrf
       <label>Name your Workspace</label>
        <input type="text" placeholder="My Workspace" name="nama" required>

        <label for="status">Send email invites</label>
        <input type="text" placeholder="mail1@gmail.com,mail2@gmail.com" name="email" >
        <button type="submit" class="btn">Submit</button>
    </form>
</div>



@endsection
