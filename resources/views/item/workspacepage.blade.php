@extends('custom.master-nav')

@section('content')


<div class="lesson-wrapper">

    <div class="container">
        <div class="categories">
            @foreach($workspaces as $key => $item)
            <div class="lesson">
                <div class="list-box list-todo">
                  <a href="/todo/{{ $item->workspace_id }}"><h2 class="workspace-title">{{$item->workspace_nama}}</h2></a> 
                    <p class="workspace-status">{{$item->status}}</p>
                    @if ($item->status=="admin")
                    <div class="workspace-but">
                    <form action="/workspace/{{$item->workspace_id}}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-delete workspace"></button>
                    </form>
                    <a href="/workspace/{{$item->workspace_id}}/edit" ><button class="button-edit workspace"></button></a>
                    </div>
                    @endif
                    <div class="clear"></div>
                </div>
               
            </div>
            
            @endforeach
        </div>


        


    </div>
</div>
<div class="sticky">
    <a class="button todo" href="/workspace/create"></a>
    </div>

@endsection
