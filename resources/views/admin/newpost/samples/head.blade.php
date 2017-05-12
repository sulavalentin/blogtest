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
    <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Blog
                    </a>
                    @if(Session::has('admin') && Session::get('admin')==1)
                        <a class="navbar-brand" href="{{ url('/admin') }}">
                            Admin
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if(Session::has('name') && Session::has('id'))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Session::has('name') }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ URL('logout') }}">
                                            Logout
                                        </a>
                                            
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ URL('login') }}">Login</a></li>
                            <li><a href="{{ URL('register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
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