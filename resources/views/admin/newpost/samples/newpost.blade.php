<!DOCTYPE html>
<!--
Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>CKEditor Sample</title>
	<script src="{{asset('ckeditor.js')}}"></script>
	<script src="{{asset('js/sample.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/samples.css')}}">
	<link rel="stylesheet" href="{{asset('toolbarconfigurator/lib/codemirror/neo.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            #cke_1_contents{
                height: 500px !important;
            }
        </style>
</head>
<body id="main">
<main>
    
    <div class="adjoined-bottom">
        <div class="container">
            <h3 class="text-center" style="margin:0px 0px 0px 0px; color:black;">Titlu</h3>
            <input type="text" id="title" class="form-control" style="margin-bottom: 15px;"/>
        </div>
        <div class="grid-container">
            <div class="grid-width-100">
                <div id="editor">
                    <body>
                        <textarea id="editor"></textarea>
                        <div id="preview"></div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</main>
<p class="text-center">
    <button class="btn btn-primary" style="margin-top:10px;" id="save">Salveaza</button>
</p>
<footer class="footer-a grid-container">
    <div class="grid-container">
        <p class="grid-width-100">
                CKEditor &ndash; The text editor for the Internet &ndash; <a class="samples" href="http://ckeditor.com/">http://ckeditor.com</a>
        </p>
        <p class="grid-width-100" id="copy">
                Copyright &copy; 2003-2017, <a class="samples" href="http://cksource.com/">CKSource</a> &ndash; Frederico Knabben. All rights reserved.
        </p>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    initSample();
    /*Action when click button with id save*/
    CKEDITOR.instances.editor.setData( '<p>Aici scriti textul.</p>' );
    $("#save").on("click",function(){
        var title=$("#title").val();
        var text = CKEDITOR.instances.editor.getData();
        if(title.length<2){
            $("#title").focus();
            if(text.length<2 ){
                CKEDITOR.instances.editor.focus();
            }else{
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/addpost')}}", 
                    data: 
                        { 
                            title:title,
                            text:text
                        },
                    success: function() {
                        
                    }
                });
            }
        }
    });
	
</script>

</body>
</html>
