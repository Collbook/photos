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
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($albums as $key => $album)
                                <tr>
                                    <td> {{ ++$key }} </td>
                                    <td> {{ $album->name }} </td>
                                    <td> {{ $album->description }} </td>
                                    <td>
                                            <a href=" {{ route('albums.edit',$album->id) }} " class="btn btn-warning btn-sm" >Edit</a>
                                            <a href="{{ route('albums.destroy',$album->id) }} " class="btn btn-danger btn-sm" >Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
