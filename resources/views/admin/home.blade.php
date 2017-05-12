@extends('layouts.app')
@section('content')
    @include('admin.menu')
    <div class="container" style='color:black;'>
        <a href="{{URL('admin/newpost')}}" class="btn btn-primary pull-right">Add new post</a>
        <div class="clearfix" style='margin-bottom:15px;'></div>
        @if(!empty($posts) && count($posts)>0)
            @foreach($posts as $i)
            <div class='content' style='width:100%; float:left; border'>
                <h2>{{$i->title}}</h2>
                <p>{!! str_limit(strip_tags($i->content), $limit = 1000, $end = '...') !!}</p>
                <p class='text-right'>{{date('d-m-Y H:i', strtotime($i->created_at))}}</p>
                <a href='{{URL("/post/".$i->id)}}' class='btn btn-default' target='_blank'>view</a>
                <a href='{{URL("/admin/edit/".$i->id)}}' class='btn btn-primary'>Edit</a>
                <a href='{{URL("/admin/delete/".$i->id)}}' class='btn btn-danger'>Delete</a>
            </div>
            @endforeach
            {{$posts->links()}} 
        @else
        <h1>Nu sunt bloguri</h1>
        @endif
        
    </div>
@endsection