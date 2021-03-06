@extends('layouts.art')

@section('content')
    <div class="starter-template">

        <div class="media">
            <img class="media-object pull-left" alt="{{$album->name}}"
                 src="/albums/{{$album->name}}/{{$album->cover_image}}"
                 width="350px">
            <div class="media-body">
                <h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
                <p>{{$album->name}}</p>
                <div class="media">
                    <h2 class="media-heading" style="font-size: 26px;">AlbumDescription :</h2>
                    <p>{{$album->description}}
                    <p>
                        <a href="{{route('add_image',array('id'=>$album->id))}}">
                            <button type="button" class="btn btn-primary btn-small">Add New Image to Album</button>
                        </a>
                        <a href="{{route('delete_album',array('id'=>$album->id))}}"
                           onclick="return confirm('Are yousure?')">
                            <button type="button" class="btn btn-danger btn-small">Delete Album</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container gallery-container">
        <div class="tz-gallery">
            <div class="row">
                @foreach($album->Images as $photo)
                    <div class="col-lg-3">
                        <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
                            <a class="lightbox" href="/albums/{{$album->name}}/{{$photo->image}}">
                                <img alt="{{$album->name}}" src="/albums/{{$album->name}}/{{$photo->image}}">
                            </a>
                            <div class="caption">
                                <p>{{$photo->description}}</p>
                                <p>Created date: {{ date("d F Y",strtotime($photo->created_at)) }}
                                    at {{ date("g:ha",strtotime($photo->created_at)) }}</p>
                                <a href="{{URL::route('delete_image',array('id'=>$photo->id))}}"
                                   onclick="return confirm('Are you sure?')">
                                    <button type="button" class="btn btn-danger btn-small">Delete Image</button>
                                </a>
                                <p>Move image to another Album :</p>
                                <form name="movephoto" method="POST" action="{{URL::route('move_image')}}">
                                    {{ csrf_field() }}
                                    <select name="new_album">
                                        @foreach($albums as $others)
                                            <option value="{{$others->id}}">{{$others->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="photo" value="{{$photo->id}}"/>
                                    <button type="submit" class="btn btn-smallbtn-info"
                                            onclick="return confirm('Are you sure?')">Move Image
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>--}}
    <script>
        baguetteBox.run('.tz-gallery');
        // baguetteBox.run('.tz-gallery');
    </script>
@endsection