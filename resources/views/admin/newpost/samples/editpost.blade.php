@extends('admin.newpost.samples.head')
@section('content')
@if(!empty($post) && count($post)>0)
<main>
    <div class="adjoined-bottom">
        <div class="container">
            <h3 class="text-center" style="margin:0px 0px 0px 0px; color:black;">Titlu</h3>
            <input type="text" id="title" class="form-control" style="margin-bottom: 15px;" value="{{$post->title}}"/>
        </div>
        <div class="grid-container">
            <div class="grid-width-100">
                <div id="editor">
                    <body>
                        <div id="preview">{!!$post->content!!}</div>
                    </body>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center">
        <button class="btn btn-primary" style="margin-top:10px;" id="save" data-loading-text="Se salveaza">Salveaza</button>
    </p>
</main>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    initSample();
    /*Action when click button with id save*/
    $("body").on("click","#save",function(){
        var title=$("#title").val();
        var content = CKEDITOR.instances.editor.getData();
        if(title.length<2){
            $("#title").focus();
        }else{
            if(content.length<2 ){
                CKEDITOR.instances.editor.focus();
            }else{
                $("#save").button("loading");
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/edit')}}", 
                    data: 
                        { 
                            _token: "{{ csrf_token() }}",
                            title:title,
                            content:content,
                            id:"{{$post->id}}"
                        },
                    success: function() {
                        location.href="{{URL('/admin')}}";
                        $("#save").button("reset");
                    },
                    error:function(){
                        $("#save").button("reset");
                        alert('a aparut o eroare');
                    }
                });
            }
        }
    });
	
</script>
@else
    <h1>Nu exista acest post</h1>
@endif
@endsection