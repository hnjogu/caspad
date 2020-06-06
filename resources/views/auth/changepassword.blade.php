@extends('layouts.admin')

@section('content')

    <!-- Content Row start here -->


          <div class="row">

            <!-- natural forest approval start here -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if (session('error'))
				        <div class="alert alert-danger">
				            {{ session('error') }}
				        </div>
				    @endif
				    @if (session('success'))
				        <div class="alert alert-success">
				            {{ session('success') }}
				        </div>
				    @endif

                  <div class="panel panel-default">
                    <div class="panel-body" contenteditable="false">
                    	<!-- changepassword start here -->
				        <div class="row justify-content-center">
				            <div class="col-md-12">
				                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
				                {{ csrf_field() }}
				                <input type="hidden"  name="password_status" value="1">
				                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
				                        <label for="new-password" class="col-md-4 control-label">Current Password</label>

				                        <div class="col-md-6">
				                            <input id="current-password" type="password" class="form-control" name="current-password" required>

				                            @if ($errors->has('current-password'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('current-password') }}</strong>
				                                </span>
				                            @endif
				                        </div>
				                    </div>

				                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
				                        <label for="new-password" class="col-md-4 control-label">New Password</label>

				                        <div class="col-md-6">
				                            <input id="new-password" type="password" class="form-control" name="new-password" required>

				                            @if ($errors->has('new-password'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('new-password') }}</strong>
				                            </span>
				                            @endif
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

				                        <div class="col-md-6">
				                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <div class="col-md-6 col-md-offset-4">
				                            <button type="submit" class="btn btn-primary">
				                                Change Password
				                            </button>
				                        </div>
				                    </div>
				                </form>
				            </div>
				        </div>
                    	<!-- changepassword end here -->
                   </div>
                  </div>
                </div>
              </div>
            </div>
        <!--  end here -->
          </div>

           <!-- Content Row end here -->
@endsection