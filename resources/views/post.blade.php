@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(!empty($post) && count($post)>0)
            <h1 style="border-bottom: 1px solid gray;">{{$post->title}}</h1>
            {!! $post->content !!}
            <p class='text-right'>Creat {{date('d-m-Y', strtotime($post->created_at))}}</p>
            @if(!empty($similar) && count($similar)>0)
                <h3>Bloguri similare</h3>
                <ul style="list-style-type:none; padding:0px;">
                    @foreach($similar as $i)
                    <li>
                        <a href="{{URL("/post/".$i->id)}}">{{$i->title}}</a>
                    </li>
                    @endforeach
                </ul>
            @endif
        @else
            <h1 class='text-center'>Acest blog nu exista</h1>
        @endif
    </div>
</div>
@endsection
