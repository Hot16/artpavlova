@extends('layouts.art')

@section('content')
    <div class="grid">

        <div class="row">
            @foreach($albums as $album)
                {{--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 masonry-item">
                    <div class="thumbnail" style="min-height: 514px;">
                        <img alt="{{$album->name}}" src="/albums/{{$album->name}}/{{$album->cover_image}}">
                        <div class="caption">
                            <h3>{{$album->name}}</h3>
                            <p>{{$album->description}}</p>
                            <p>{{count($album->Images)}} image(s).</p>
                            <p>Created date: {{ date("d F Y",strtotime($album->created_at)) }}
                                at {{date("g:ha",strtotime($album->created_at)) }}</p>
                            <p><a href="{{route('show_album', ['id'=>$album->id])}}" class="btn btn-big btn-default">Show
                                    Gallery</a></p>
                        </div>
                    </div>
                </div>--}}
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 masonry-item">
                    <div class="box-masonry">
                        <a href="{{route('show_album', ['slug'=>$album->slug])}}" title="" class="box-masonry-image with-hover-overlay">
                            <img src="/albums/{{$album->name}}/{{$album->cover_image}}" alt="" class="img-responsive">
                        </a>
                        <div class="box-masonry-hover-text-header">
                            <h4><a href="{{route('show_album', ['slug'=>$album->slug])}}">{{$album->name}}</a></h4>
                            <div class="box-masonry-desription">
                                <p>{{$album->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div><!-- /.container -->
@endsection