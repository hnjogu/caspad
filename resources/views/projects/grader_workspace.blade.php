@extends('layouts.workspace')

@section('content')
<div class="mt-4">
    <form action="{{ route('graderworkspace.store', $row->id) }}" method="POST">
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
                    <textarea class="form-control" name="body" id="summernote" cols="50">{!!$row['body']!!}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <span>Accuracy</span>
                            <select name="accuracy" class="form-control" id="exampleFormControlSelect1">
                              <option selected disabled>Rate the Accuracy</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <span>Formatting</span>
                            <select name="formatting" class="form-control" id="exampleFormControlSelect1">
                              <option selected disabled>Rate the Formatting</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <span>Comment from Grader</span>
                    <textarea name="comments" rows="8" cols="80"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
