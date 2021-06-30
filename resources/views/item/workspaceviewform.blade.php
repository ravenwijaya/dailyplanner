@extends('custom.master-nav')

@section('content')

<div class="form-popup workspaceform" id="myForm">
    <a href="/workspace" class="btn-back">Back</a>
    <h1 class="form-title">Workspace</h1>
    <div class="form-container">
        <form action="/workspace/name" method="POST" style="display: inline">
        
            <input id="nama" type="text" value="{{$workspace->nama}}" name="nama" readonly>
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
                    


                </span>
                @endif
            </div>

            @endforeach
          


        </div>





    </div>
</div>



@endsection
