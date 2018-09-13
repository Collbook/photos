@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-header"> List Photos of albums {{ $album->name }}
                    <a href=" {{ route('photo.create',['id'=>$album->id]) }} " class="btn btn-info btn-sm float-right" >Upload Photo to Albums</a> 
                    <a href=" {{ route('albums') }} " class="btn btn-blank btn-sm float-right" >Go back  </a>
                </div>
                <div class="card-body table-responsive">
                    @if(Session::has('status'))
                    <div class="alert alert-success">
                        {{ Session::get('status') }}
                    </div>
                    @endif

                    @if(count($album->photos) > 0)
                        <div id="albums">
                        <div class="row text-center">
                            @foreach($album->photos as $photo)
                                <div class='col-md-3'>
                    
                                    <a href="{{ route('photos.show',$photo->id) }} ">
                                        <img src="/storage/uploads/photos/{{ $photo->album_id }}/{{$photo->photo}}" alt="{{$photo->title}}" class="img-thumbnail">
                                    </a>
                                    <br>
                                    <h4>
                                        <br>
                                        <p class="lead">{{$photo->title}}</p>
                                        <a href=" {{ route('photos.show',$photo->id) }} " class="btn btn-warning btn-sm" >Show</a>
                                        <a href="{{ route('photos.destroy',$photo->id) }} " class="btn btn-danger btn-sm" >Delete</a>
                                    </h4>
                                    <br/>
                                </div>
                               
                               
                            @endforeach
                        </div>
                        </div>
                    @else
                        <p>No Photos To Display</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
