@extends('layouts.caspad')

@section('content')

<div class="container">
        <div class="row mt-4">
          <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">Accounts Panel</div>
                    <div class="card-body">
                        <p class="text-info">Administrator's Accounts Manager</p>
                        <a class="btn btn-dblue btn-sm" href="{{ route('projects.create') }}"> <i class="fas fa-edit fa-3x"></i> <div class="mt-2">Pay <br>Freelancers</div> </a>
                        <a class="btn btn-dblue btn-sm" href="{{ route('projects.create') }}"> <i class="fas fa-edit fa-3x"></i> <div class="mt-2">Pay <br>Graders</div> </a>
                        <a class="btn btn-dblue btn-sm" href="{{ route('projects.create') }}"> <i class="fas fa-edit fa-3x"></i> <div class="mt-2">Paid <br>Project by Clients</div> </a>
                        <a class="btn btn-dblue btn-sm" href="{{ route('projects.create') }}"> <i class="fas fa-edit fa-3x"></i> <div class="mt-2">Paid <br>Users</div> </a>
                        <br>
                        <hr>
                        <p class="text-info">Client's Accounts Manager</p>
                        <hr>
                        <a class="btn btn-dblue btn-sm" href="{{ route('projects.create') }}"> <i class="fas fa-edit fa-3x"></i> <div class="mt-2">Paid <br>Projects</div> </a>
                        <br>
                        <hr>
                        <p class="text-info">Freelancer's Account Manager</p>
                        <hr>
                        <a class="btn btn-dblue btn-sm" href="{{ route('findwork.index') }}"> <i class="fas fa-edit fa-3x"></i> <div class="mt-2">My  <br> Earnings</div> </a>

                        <br>
                        <hr>
                        <p class="text-info">Grader's Account Manager</p>
                        <hr>

                        <a class="btn btn-dblue btn-sm" href="/findwork/grader"> <i class="fas fa-edit fa-3x"></i> <div class="mt-2">My <br> Earnings</div> </a>
                    </div>
                    <div class="card-footer"></div>
                </div>
          </div>
	      </div>
</div>

@endsection
