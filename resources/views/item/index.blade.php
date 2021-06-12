@extends('custom.master-nav')

@section('content')
<div class="lesson-wrapper">
    <div class="container">
        <!-- <h1 id="welcome">Welcome to TODO, {{ Auth::check() ? Auth::user()->name : '' }}</h1> -->

        <div class="categories">
            <div class="lesson">
                <div class="todo-box">
                    <h3>TO DO</h3>
                    <button class="button todo"></button>
                </div>
                @foreach($todo as $key => $item)
                <div class="list-box list-todo">
                    <button class="button-next todo"></button>
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <p>{{$item->judul}}</p>
                    <button class="button-delete"></button>
                    <button class="button-edit"></button>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <div class="lesson">
                <div class="inprogress-box">
                    <button class="button inprogress"></button>
                    <h3>IN PROGRESS</h3>
                </div>
                @foreach($inprogress as $key => $item)
                <div class="list-box list-inprogress">
                    <button class="button-next inprogress"></button>
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <h4>{{$item->kategori}}</h4>
                    <p>{{$item->judul}}</p>
                    <button class="button-delete"></button>
                    <button class="button-edit"></button>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <div class="lesson">
                <div class="ongoing-box">
                    <button class="button ongoing"></button>
                    <h3>ON GOING</h3>
                </div>
                @foreach($ongoing as $key => $item)
                <div class="list-box list-ongoing">
                    <button class="button-next ongoing"></button>
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <h4>{{$item->kategori}}</h4>
                    <p>{{$item->judul}}</p>
                    <button class="button-delete"></button>
                    <button class="button-edit"></button>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
            <div class="lesson">
                <div class="finished-box">
                    <button class="button finished"></button>
                    <h3>FINISHED</h3>
                </div>
                @foreach($finished as $key => $item)
                <div class="list-box list-finished">
                    <button class="button-next finished"></button>
                    <h4>{{$item->kategori}} <br>Deadline: <span>{{$item->deadline}}</span></h4>
                    <h4>{{$item->kategori}}</h4>
                    <p>{{$item->judul}}</p>
                    <button class="button-delete"></button>
                    <button class="button-edit"></button>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>

@endsection
