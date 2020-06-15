@extends('layouts.workspace')

@section('content')
<div class="mt-4">
    <form action="">
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
                </div>
                <textarea name="" id="summernote" cols="50"></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection


