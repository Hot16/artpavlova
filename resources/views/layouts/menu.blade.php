{{--<div class="navbar navbar-inverse navbar-fixed-top">--}}
{{--<div class="container">--}}
{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="/">Awesome Albums</a>--}}
{{--<div class="nav-collapse">--}}
{{--<ul class="nav navbar-nav">--}}
{{--<li><a href="{{URL::route('create_album_form')}}">Create New Album</a></li>--}}
{{--</ul>--}}
{{--</div><!--/.nav-collapse -->--}}
{{--</div>--}}
{{--</div>--}}

<!--   *** SIDEBAR ***-->

{{--@extends('layouts.art')--}}

{{--@section('menu')--}}
    <div class="sidebar-content">
        <h1 class="sidebar-heading"><a href="/">Artpavlova.com</a></h1>
        <p class="sidebar-p">I am a creative illustrator and graphic designer with more than 10 years of
            experience. </p>
        <p class="sidebar-p">Originally from Toronto, currently based in London. </p>
        <ul class="sidebar-menu">
            <li class="active"><a href="/">Home</a></li>
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
            <p class="credit">&copy;2009-<?=date('Y')?> Your name or company | Template by <a
                        href="https://bootstrapious.com/e-commerce-templates" class="external">Bootstrapious</a></p>
            <!-- Please do not remove the backlink to us, unless you support the development at https://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)        -->

        </div>
    </div>
{{--@endsection--}}
