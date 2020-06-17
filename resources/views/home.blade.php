@extends('layouts.caspad')

@section('content')
<div class="mt-4">
  @foreach ($role as $role_user)
    @if($role_user == 'Admin')
      <div class="row">
{{--         <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Admin</span>
              <span class="info-box-number">({{count($users_count)}}) </span></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
{{--         <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Freelancers</span>
              <span class="badge badge-secondary">Freelancers: {{ $roles->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Projects</span>
              <span class="info-box-number">{{ $Total_Projects->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
{{--         <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Graders</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
{{--         <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clients</span>
              <span class="info-box-number">({{count($role)}})</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
        <!-- /.total users -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

            <div class="info-box-content">
              <span class="badge badge-secondary">Total Users: {{ $Total_users->count() }}</span>
              <span class="badge badge-secondary">Today New Users: {{ $Today_new_users->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Roles</span>
              <span class="badge badge-secondary"> {{ $roles->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    @endif
    @if($role_user == 'Freelancer')
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">My jobs</span>
              <span class="badge badge-success">jobs({{count($Freelancer_jobs)}})</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Resume Job</span>
              <span class="badge badge-success"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    @endif
    @if($role_user == 'Client')
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">My posted jobs</span>
              <span class="badge badge-success">jobs({{count($client_jobs)}})</span>
              {{-- <span class="info-box-number"> </span></span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    @endif
    @if($role_user == 'Grader')
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Grader</span>
              <span class="info-box-number"> </span></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Projects</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
    @endif
  @endforeach
</div>
@endsection
