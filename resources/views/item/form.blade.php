@extends('custom.master-nav')

@section('content')

<div class="form-popup" id="myForm">
<a href="{{ route('todo.index') }}" class="btn-back">Back</a>
    <h1 class="form-title">New Todo</h1>
    <!-- <a href="{{ url()->previous() }}">Back</a> -->
    <form role="form" action="/todoc" method="POST" class="form-container">
   
        @csrf
        <input type="hidden" class="form-control" id="user_id" value=" {{Auth::user()->id}}" name="user_id" readonly>
        <input id="category" type="text" placeholder="Enter Category" name="kategori" required>
        <input type="text" placeholder="Enter Title" name="judul" required>
        <label for="status">Status:</label>

        <select name="status" id="status">
            <option value="todo">Todo</option>
            <option value="inprogress">Inprogress</option>
            <option value="ongoing">Ongoing</option>
            <option value="finished">Finished</option>
        </select>
        <div class="deadline">
            <label>Deadline :</label>
        </div>

        <input type="date" placeholder="Enter Deadline" name="deadline" required>
        <div class="form-group">
            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
        </div>




        <button type="submit" class="btn">Submit</button>
        
        

    </form>
</div>



@endsection
