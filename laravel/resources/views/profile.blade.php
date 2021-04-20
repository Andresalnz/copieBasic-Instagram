@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-user">
                    <div class="container-avatar">
                        <img src="{{route('User.avatar',['filename'=>$user->image])}}"/>
                    </div>
                    <div class="user-info">
                        <h1>{{'@'.$user->nick}}</h1>
                        <h2>{{$user->name." ".$user->surname}}</h2>
                        <p>{{'Se unio en: '. \FormatTime::LongTimeFilter($user->created_at) }}</p>
                    </div>
                    <!--<div class="container-images">
                        {{--@foreach($images as $image)--}}
                            <img src="{{--route('Image.file',['filename'=>$image->image_path])--}}" width="100%">
                       {{-- @endforeach--}}
                    </div>-->
                </div>
            </div>
        </div>
    </div>
@endsection
