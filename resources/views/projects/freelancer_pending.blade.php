@extends('layouts.caspad')

@section('content')

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">
            <h4>My Pending Projects</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="py-4">
              @if ($row->count()> 0)
                  Your pending project is here <a class="btn btn-success btn-sm" href="{{route('freelancer.resume')}}">Resume Job</a>
              @else
                  <p>You dont have any pending job, {{Auth::user()->name}}</p>
              @endif
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary btn-sm" href="{{ route('getprojectsindex') }}"> <i class="fa fa-reply"></i> Back</a>
        </div>
      </div>
</div>
@endsection
