@extends('layouts.caspad')

@section('content')

                  @forelse ($user_id as $user_id)
                        @empty       
                  @endforelse
    <div class="container-fluid mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">User information</div>
                <div class="card-body">
                    <div class="row user-infos user3">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Name: {{$user_id->name}} {{$user_id->lastname}}   
                                    </h3>
                                    <!-- <h3 class="panel-title pull-right"style="position:relative;right:-400px">Name:{{$user_id->name}} {{$user_id->lastname}} </h3> -->
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                            <strong>Other Details @if(!empty($user->getRoleNames()))
                                              @foreach($user->getRoleNames() as $v)
                                                 <label class="badge badge-success">{{ $v }}</label>
                                              @endforeach
                                            @endif </strong><br>
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>National ID:</td>
                                                        <td>{{$user_id->id_number}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country:</td>
                                                        <td>{{$user_id->country}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Capital City:</td>
                                                        <td>{{$user_id->capitalcity}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{$user_id->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Company</td>
                                                        <td>{{$user_id->company}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number</td>
                                                        <td>{{$user_id->mobile}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <span class="pull-right">
                                        <a class='btn btn-sm btn-warning btn-xs' href="{{ url('/geteditprofile/'.$user_id->id)}}"><i class="fas fa-edit"></i> Edit</a>

                                    </span>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
