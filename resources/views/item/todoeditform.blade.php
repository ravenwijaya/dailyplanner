@extends('custom.master-nav')

@section('content')

<div class="form-popup" id="myForm">
    <a href="/todo/{{$todo->workspace_id}}"class="btn-back">Back</a>
    <h1 class="form-title">Edit Todo</h1>
    <!-- <a href="{{ url()->previous() }}">Back</a> -->
    <form role="form" action="/todo/{{$todo->workspace_id}}" method="POST" class="form-container">

        @csrf
        @method('PUT')
        <input type="hidden" class="form-control" id="todo_id" value="{{$todo->id}}" name="id" readonly>
        <input id="category" type="text" placeholder="Enter Category" value="{{$todo->kategori}}" name="kategori"
            required>
        <input type="text" placeholder="Enter Title" value="{{$todo->judul}}" name="judul" required>
        <label for="status">Status:</label>
        <?php
				$options = array("Todo", "Inprogress", "Done");
				echo "<select name='status' id='status'>";
				foreach ($options as $option) {

					if (ucwords($todo->status) == $option) {
						echo "<option selected ='selected' value='$option'>$option</option>";
					} else
						echo "<option value='$option'>$option</option>";
				}

				echo "</select>";

				?>
        <!-- <select name="status" id="status" value="{{$todo->status}}">
            <option value="todo">Todo</option>
            <option value="inprogress">Inprogress</option>
            <option value="ongoing">Ongoing</option>
            <option value="finished">Finished</option>
        </select> -->
        <div class="deadline">
            <label>Deadline :</label>
        </div>

        <input type="date" placeholder="Enter Deadline" name="deadline" value="{{$todo->deadline}}" required>
        <div class="form-group">
            <textarea class="ckeditor form-control" name="wysiwyg-editor">{{$todo->isi}}</textarea>
        </div>




        <button type="submit" class="btn">Submit</button>



    </form>
</div>



@endsection
