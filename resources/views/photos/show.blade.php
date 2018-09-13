@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header"> 
                    {{ $photo->title }}
                    <a href=" {{ route('albums.show',['id'=>$photo->album_id]) }}" class="btn btn-blank btn-sm  btn-outline-secondary float-right" >Go back </a>
                </div>

                <div class="card-body">
                    <img src="/storage/uploads/photos/{{ $photo->album_id }}/{{$photo->photo}}" alt="{{$photo->title}}" class="img-thumbnail">


                        <form method="POST" action="#" enctype="multipart/form-data">
                            @csrf
  
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
