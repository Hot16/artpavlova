<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Awesome Albums</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/combined.js') }}"></script>

    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <div id="sidebar" class="col-xs-6 col-sm-4 col-md-3 sidebar-offcanvas">

                <div class="sidebar-content">
                    <h1 class="sidebar-heading"><a href="/">Artpavlova.com</a></h1>
                    <p class="sidebar-p">I am a creative illustrator and graphic designer with more than 10 years of
                        experience. </p>
                    <p class="sidebar-p">Originally from Toronto, currently based in London. </p>
                    <ul class="sidebar-menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{URL::route('create_category_album')}}">Создать категорию альбомов</a></li>
                        <li><a href="{{URL::route('create_album_form')}}">Создать альбом</a></li>
                    </ul>
                    <p class="social"><a href="#" data-animate-hover="pulse" class="external facebook"><i
                                    class="fa fa-facebook"></i></a><a href="#" data-animate-hover="pulse"
                                                                      class="external gplus"><i
                                    class="fa fa-google-plus"></i></a><a href="#" data-animate-hover="pulse"
                                                                         class="external twitter"><i
                                    class="fa fa-twitter"></i></a><a
                                href="#" title="" class="external instagram"><i class="fa fa-instagram"></i></a><a href="#"
                                                                                                                   data-animate-hover="pulse"
                                                                                                                   class="email"><i
                                    class="fa fa-envelope"></i></a></p>
                    <div class="copyright">
                        <p class="credit">&copy;2010-<?=date('Y')?> Your name or company | Template by <a
                                    href="https://bootstrapious.com/e-commerce-templates" class="external">Bootstrapious</a></p>
                        <!-- Please do not remove the backlink to us, unless you support the development at https://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)        -->

                    </div>
                </div>


            </div>


            <div class="col-xs-12 col-sm-8 col-md-9 content-column">
                <div class="small-navbar visible-xs">
                    <button type="button" data-toggle="offcanvas" class="btn btn-ghost pull-left"><i
                                class="fa fa-align-left"> </i>Menu
                    </button>
                    <h1 class="small-navbar-heading"><a href="/">Artpavlova.com </a></h1>
                </div>

                @yield('content')

            </div>
        </div>
    </div>
</div>

</body>
</html>
