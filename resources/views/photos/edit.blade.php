@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> 
                    Upload a photo
                    <a href="{{ route('photos.update',['id'=>$photo->id]) }}" class="btn btn-blank btn-sm  btn-outline-secondary float-right" >Go back </a>
                </div>

                <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('photo.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="title">Photos title</label>
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="Enter title" required autofocus>
                                    
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="album_id" value=" {{ $album_id }} " >

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="description">Photos description</label>
                                    <textarea  rows="6" id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" placeholder="Enter description" required autofocus> </textarea>
                                    
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="description">Image Cover</label>
                                    <input id="photo" type="file" class="{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" >
                                    
                                    @if ($errors->has('photo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('photos') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Upload Photo
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
