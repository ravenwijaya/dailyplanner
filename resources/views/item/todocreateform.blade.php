@extends('custom.master-nav')

@section('content')

<div class="form-popup" id="myForm">
<a href="/todo/{{$id}}" class="btn-back">Back</a>
    <h1 class="form-title">New Todo</h1>
    <form role="form" action="/todo/{{$id}}" method="POST" class="form-container">
   
        @csrf
        <input id="category" type="text" placeholder="Enter Category" name="kategori" required>
        <input type="text" placeholder="Enter Title" name="judul" required>
        <label for="status">Status:</label>

        <select name="status" id="status">
            <option value="todo">Todo</option>
            <option value="inprogress">Inprogress</option>
            <option value="done">Done</option>
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
