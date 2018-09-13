@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-header"> Albums <a href=" {{ route('albums.create') }} " class="btn btn-info btn-sm" >Create Albums</a> </div>
                <div class="card-body table-responsive">
                    @if(Session::has('status'))
                    <div class="alert alert-success">
                        {{ Session::get('status') }}
                    </div>
                    @endif
                    
                    @if(count($albums) > 0)
                        <div id="albums">
                        <div class="row text-center">
                            @foreach($albums as $album)
                                <div class='col-md-3'>
                    
                                    <a href="/albums/{{$album->id}}">
                                        <img src="/storage/uploads/albums/{{$album->cover_image}}" height="200" alt="{{$album->name}}" class="img-thumbnail">
                                    </a>
                                    <br>
                                    <h4>
                                        <br>
                                        <p class="lead">{{$album->name}}</p>
                                        <a href=" {{ route('albums.edit',$album->id) }} " class="btn btn-warning btn-sm" >Edit</a>
                                        <a href="{{ route('albums.destroy',$album->id) }} " class="btn btn-danger btn-sm" >Delete</a>
                                    </h4>
                                    <br/>
                                </div>
                               
                               
                            @endforeach
                        </div>
                        </div>
                    @else
                        <p>No Albums To Display</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
