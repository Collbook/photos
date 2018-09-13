@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> 
                    Create albums  
                    <a href=" {{ route('albums') }} " class="btn btn-blank btn-sm  btn-outline-secondary float-right" >Go back </a>
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

                        <form method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="name">Ablums name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter name" required autofocus>
                                    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="description">Ablums description</label>
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
                                    <input id="cover_image" type="file" class="{{ $errors->has('cover_image') ? ' is-invalid' : '' }}" name="cover_image" value="{{ old('cover_image') }}" >
                                    
                                    @if ($errors->has('cover_image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Create Albums
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
