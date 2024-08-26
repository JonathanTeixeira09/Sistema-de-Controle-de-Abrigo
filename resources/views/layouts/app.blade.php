<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('title')">
    <meta name="author" content="Jonathan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::to('img/logo.ico') }}">
    <title> @yield('title') </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap.mim.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrapcore.mim.css') }}">

    <!-- Custom styles for this template -->
    <!--<link href="assets/css/sidebars.css" rel="stylesheet">-->

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 767px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
        
    }
    </style>
 
</head>

<body>
    <header class="py-4 d-flex align-items-stretch border-bottom">
    
        @include('menu')

    </header>
   
    <div class="container" role="main">
        <div class="row">
            <div class="col-md-12  mx-auto justify-content-center align-items-center flex-column">
                <div class="page-header">
                    <br>
                    <h2 style="text-align: center;">@yield('title')</h2>
                    <hr>
                </div>
                <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">
                    @include('flash::message')
                        
                </div>
                @yield('conteudo')
            </div>
        </div>
    </div>
    <div class="container my-5">
    <footer class="text-center text-lg-start bg-dark fixed-bottom">
         @extends('footer')
    </footer>
    </div>

    
    <!--Js Bootstrap-->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    
    <!-- Scripts JS -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!--<script src="{{ asset('js/popper.min.js')}}"></script>--><!-- descomentei -->
    <script src="{{ asset('js/popper.min.2.js')}}"></script>
    <!--<script src="{{ asset('js/jquery2.mask.min.js')}}"></script>--><!-- descomentei -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js')}}"></script><!-- descomentei -->
    <script src="{{ asset('js/jquery.mask.min.js')}}"></script><!-- descomentei -->
</body>

</html>
