@extends('custom.master-nav')

@section('content')

<div class="form-popup workspaceform" id="myForm">
    <a href="/workspace" class="btn-back">Back</a>
    <h1 class="form-title">Edit Workspace</h1>
    <div class="form-container">
        <form action="/workspace/name" method="POST" style="display: inline">
            @csrf
            @method('PUT')
            <input type="hidden" class="form-control" id="workspace_id" value="{{$workspace->id}}" name="id"
                    readonly>
            <input id="nama" type="text" value="{{$workspace->nama}}" name="nama" required><input type="submit"
                value="change">
        </form>
        <div style="margin-bottom:30px;">
            <label>Member:<br></label>

            @foreach($member as $key => $item)
            <div id="member">
                @if ($item->status == 'admin')
                <span class="badge badge-success">{{ $item->name}}
                    <a style="color: yellow;"><i class="fas fa-crown"></i></a>
                </span>
                @else
                <span class="badge badge-success">{{ $item->name}}
                    <form action="/member/admin/{{$workspace->id}}/{{$item->id}}" method="post"
                        style="display: inline">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="button-king workspace"></button>
                    </form>

                    <form action="/member/delete/{{$workspace->id}}/{{$item->id}}" method="post"
                        style="display: inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="button-delete workspace"></button>
                    </form>



                </span>
                @endif
            </div>

            @endforeach

            <form action="/workspace/invite" method="POST" style="display: inline">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control" id="workspace_id" value="{{$workspace->id}}" name="id"
                    readonly>
                <input type="text" placeholder="example@gmail.com" id="email" name="email" required><input type="submit"
                    value="Invite">

            </form>


        </div>





    </div>
</div>



@endsection
