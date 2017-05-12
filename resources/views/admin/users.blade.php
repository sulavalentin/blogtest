@extends('layouts.app')

@section('content')
    @include('admin.menu')
    <div class="container" style='color:black; margin-top:15px;'>
        @if(!empty($users) && count($users)>0)
            @foreach($users as $i)
            <div class='content' style='width:100%; float:left; border-bottom:1px solid gray; padding-bottom:10px;'>
                <p><b>Nume:</b> {{$i->name}}</p>
                <p><b>Email:</b> {{$i->email}}</p>
                <p><b>Data inregistrarii:</b> {{date('d-m-Y', strtotime($i->created_at))}}</p>
                @if($i->admin==false)
                    <form method="post" action="{{URL("/admin/upadmin/".$i->id)}}" style="float:left; margin-right: 5px;">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                        <button type="submit" class='btn btn-primary'>Creaza-l admin</button>
                    </form>
                @else
                    <form method="post" action="{{URL("/admin/downadmin/".$i->id)}}" style="float:left; margin-right: 5px;">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                        <button type="submit" class='btn btn-default'>Creaza-l utilizator</button>
                    </form>
                @endif
                <a href='{{URL("/admin/deletecomment/".$i->id)}}' class='btn btn-danger'>Delete</a>
            </div>
            @endforeach
            {{$users->links()}}
        @else
        <h1>Nu sunt utilizatori</h1>
        @endif
    </div>
@endsection