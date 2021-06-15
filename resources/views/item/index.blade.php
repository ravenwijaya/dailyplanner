@extends('custom.master-nav')

@section('content')

<div class="lesson-wrapper">

    <div class="container">
        <!-- <h1 id="welcome">Welcome to TODO, {{ Auth::check() ? Auth::user()->name : '' }}</h1> -->
        
        <div class="categories">
            <div class="lesson">
                <div class="todo-box">
                    <h3>TO DO</h3>
                    <!-- <button class="button todo" onclick="openForm('todo')"></button> -->
                </div>
                @foreach($todo as $key => $item)
                <div class="list-box list-todo">
                 
                   <a href="/changestatus/{{$item->id}}/{{'inprogress'}}" ><button class="button-next todo"></button></a> 
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <p>{{$item->judul}}</p>
                    <form action="/todo/{{$item->id}}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-delete"></button>
                    </form>
                    <a href="/todo/{{$item->id}}/edit" ><button class="button-edit"></button></a>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <div class="lesson">
                <div class="inprogress-box">
                    <!-- <button class="button inprogress" onclick="openForm('inprogress')"></button> -->
                    <h3>IN PROGRESS</h3>
                </div>
                @foreach($inprogress as $key => $item)
                <div class="list-box list-inprogress">
                <a href="/changestatus/{{$item->id}}/{{'ongoing'}}" ><button class="button-next todo"></button></a> 
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <p>{{$item->judul}}</p>
                    <form action="/todo/{{$item->id}}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-delete"></button>
                    </form>
                    <a href="/todo/{{$item->id}}/edit" ><button class="button-edit"></button></a>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <div class="lesson">
                <div class="ongoing-box">
                    <!-- <button class="button ongoing" onclick="openForm('ongoing')"></button> -->
                    <h3>ON GOING</h3>
                </div>
                @foreach($ongoing as $key => $item)
                <div class="list-box list-ongoing">
                     <a href="/changestatus/{{$item->id}}/{{'finished'}}" ><button class="button-next ongoing"></button></a> 
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <p>{{$item->judul}}</p>
                    <form action="/todo/{{$item->id}}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-delete"></button>
                    </form>
                    <a href="/todo/{{$item->id}}/edit" ><button class="button-edit"></button></a>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <div class="lesson">
                <div class="finished-box">
                    <!-- <button class="button finished" onclick="openForm('finished')"></button> -->
                    <h3>FINISHED</h3>
                </div>
                @foreach($finished as $key => $item)
                <div class="list-box list-finished">
                    
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <p>{{$item->judul}}</p>
                    <form action="/todo/{{$item->id}}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-delete"></button>
                    </form>
                    <a href="/todo/{{$item->id}}/edit" ><button class="button-edit"></button></a>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
        </div>


        


    </div>
</div>
<!-- <a  class="btn btn-primary mb-3">
    <i class="fas fa-plus-circle mr-1"></i> Create new Todo
    
</a> -->
<div class="sticky">
    <a class="button todo" href="{{ route('todo.create') }}"></a>
    </div>

@endsection
