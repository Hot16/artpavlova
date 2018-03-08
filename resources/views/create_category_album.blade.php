@extends('layouts.art')

@section('content')
    <div class="span4" style="display: inline-block;margin-top:100px;">

{{--        @if (isset($errors) && $errors->has(''))
            <div class="alert alert-block alert-error fade in" id="error-block">
                <?php
                $messages = $errors->all('<li>:message</li>');
                ?>
                <button type="button" class="close" data-dismiss="alert">×</button>

                <h4>Warning!</h4>
                <ul>
                    @foreach($messages as $message)
                        {{$message}}
                    @endforeach
                </ul>
            </div>
        @endif--}}
        @if(count($categoryes_list)>0)
            @foreach($categoryes_list as $category)
                <p>{{$category->id}} {{$category->name}} {{$category->parent_id}}</p>
            @endforeach
        @endif


        <form name="createnewcategoryalbum" method="POST" action="{{route('create_category_album')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>
                <legend>Создать категорию для альбомов</legend>
                <div class="form-group">
                    <label for="name">Название категории</label>
                    <input name="name" type="text" class="form-control" placeholder="Название категории"
                           value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="description">Описание категории</label>
                    <textarea name="description" type="text" class="form-control"
                              placeholder="Описание категории">{{old('descrption')}}</textarea>
                </div>
                @if(count($categoryes_list)>0)
                <div class="form-group">
                    <label for="parent_category">Родительская категория</label>
                    <select name="parent_category">
                        <option value="0">Верхний уровень</option>
                        @foreach( $categoryes_list as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                @endif
                <div class="form-group">
                    <label for="cover_image">Select a Cover Image</label>
                    {{Form::file('cover_image')}}
                </div>
                <button type="submit" class="btnbtn-default">Создать</button>
            </fieldset>
        </form>
    </div>
@endsection
