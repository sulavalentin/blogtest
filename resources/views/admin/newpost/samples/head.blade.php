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
            <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <style>
            #cke_1_contents{
                height: 500px !important;
            }
        </style>
</head>
<body id="main">
    @yield('content')
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
</body>
</html>