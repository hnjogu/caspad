@extends('layouts.workspace')

@section('content')
<div class="mt-4">
    <form action="{{ route('workspace.store', $row->id) }}" method="POST">
      @csrf
      @method('POST')
        <div class="card">
            <div class="card-header bg-info"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <video id="myVideo" width="500" height="200" controls>
                            <source src="{{asset('/files/' .$row->file_name)}}" type="audio/ogg">
                        </video>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Instructions</b> : {{$row->instructions}}
                        </p>
                    </div>
                    <hr>
                </div>
                <div class="form-group mt-4">
                    <textarea class="form-control" name="body" id="summernote" cols="50"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
