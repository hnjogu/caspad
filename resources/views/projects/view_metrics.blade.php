@extends('layouts.caspad')

@section('content')

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">
            <h4>Projects & Metrics</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="row mt-3">
                <div class="col-md-4">
                    <p>{{$row->project_id}}</p>
                </div>
                <div class="col-md-8">
                        {{$row->comments}}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary btn-sm" href="/metrics"> <i class="fa fa-reply"></i> Back</a>
        </div>
      </div>
</div>
@endsection
