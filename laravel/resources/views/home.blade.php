@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach($images as $image)
                            <div class="card pub-image ">
                                <div class="card-header ">
                                    @if($image->user->image)
                                        <div class="container-avatar">
                                            <img src="{{route('User.avatar',['filename'=>$image->user->image])}}" class=" avatar img-fluid rounded-circle" width="10%">
                                        </div>
                                    @endif
                                    <div class="data-user">
                                        <a href="{{route('User.profile',['id'=>$image->user->id])}}">{{$image->user->name." ".$image->user->surname}}
                                            <span class="nickname">{{'| @' . $image->user->nick}}</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="image-container">
                                       <img src="{{route('Image.file',['filename'=>$image->image_path])}}" width="100%">
                                    </div>
                                    <div class="likes"></div>
                                    <div class="description">
                                        <span class="nickname">{{'@'.$image->user->nick}}</span>
                                        <span class="nickname-date">{{'|'." ".FormatTime::LongTimeFilter($image->created_at)}}</span>
                                        <p>{{$image->description}}</p>
                                    </div>

                                    <div class="likes">
                                        <?php $user_like = false;?>
                                        @foreach($image->likes as $like)
                                            @if($like->user->id == Auth::user()->id)
                                                <?php $user_like = true;?>
                                            @endif
                                        @endforeach
                                        @if($user_like)
                                            <img src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}" class="btn-like"  width="5%">
                                        @else
                                            <img src="{{asset('img/heart-black.png')}}" data-id="{{$image->id}}" class="btn-dislike" width="5%">
                                        @endif
                                        <span class="number-likes">{{count($image->likes)}}</span>
                                    </div>

                                    <div class="comments">
                                        <a class="btn btn-sm btn-warning btn-comments" href="{{route('Image.detail',['id'=>$image->id])}}"> Comentarios ({{count($image->comments)}}</a>
                                    </div>
                                </div>
                            </div>

                    @endforeach

                        <div class="clearfix"></div> {{$images->links()}} </div>




            </div>
        </div>
    </div>
</div>
@endsection
