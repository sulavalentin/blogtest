@extends('layouts.app')

@section('content')
    @include('admin.menu')
    <div class="container" style='color:black;'>
        @if(!empty($comments) && count($comments)>0)
            @foreach($comments as $i)
            <div class='content' style='width:100%; float:left; border-bottom:1px solid gray; padding-bottom:10px;'>
                <h2>Post_id {{$i->post_id}} <b>Titlu:</b> {{$i->title}}</h2>
                <h3><b>Comentariu:</b> {{$i->comment}}</h3>
                <p><b>Data:</b> {{date('d-m-Y H:i', strtotime($i->created_at))}}</p>
                @if($i->hidden==false)
                    <form method="post" action="{{URL("/admin/acceptcomment/".$i->id)}}" style="float:left; margin-right: 5px;">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                        <button type="submit" class='btn btn-primary'>Accept comment</button>
                    </form>
                @else
                    <form method="post" action="{{URL("/admin/refusecomment/".$i->id)}}" style="float:left; margin-right: 5px;">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                        <button type="submit" class='btn btn-default'>Refuse comment</button>
                    </form>
                @endif
                <a href='{{URL("/admin/deletecomment/".$i->id)}}' class='btn btn-danger'>Delete</a>
            </div>
            @endforeach
            {{$comments->links()}}
        @else
        <h1>Nu sunt commentarii</h1>
        @endif
    </div>
@endsection