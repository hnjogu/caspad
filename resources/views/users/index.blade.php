@extends('layouts.caspad')

@section('content')
          <!-- Content Row start here -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users Management</h6>
                    <div class="pull-right">
                      @can('user-create')
                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                      @endcan
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                      <p>{{ $message }}</p>
                    </div>
                  @endif

                  <div class="table-responsive">
                    <table id="dev-table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                           <th>No</th>
                           <th>Name</th>
                           <th>Last Name</th>
                           <th>Phone Number</th>
                           <th>National ID</th>
                           <th>Country</th>
                           <th>Capital City</th>
                           <th>Email</th>
                           <th>Company Name</th>
                           <th>Approve Status</th>
                           <th>Roles</th>
                           <th width="280px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($data as $key => $user)
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->lastname }}</td>
                          <td>{{ $user->mobile }}</td>
                          <td>{{ $user->id_number }}</td>
                          <td>{{ $user->country }}</td>
                          <td>{{ $user->capitalcity }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->company }}</td>
                          <td>
                              @if($user->approved_at == '1')
                                <span class="badge badge-success">Approved</span>
                              @endif
                              @if($user->approved_at == '0')
                                <span class="badge badge-warning">Not Approved</span>
                              @endif
                          </td>
                          <td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                 <label class="badge badge-success">{{ $v }}</label>
                              @endforeach
                            @endif
                          </td>
                          <td>
                             <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                @can('user-edit')
                                  <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                @endcan
                                @can('user-delete')
                                  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                  {!! Form::close() !!}
                                @endcan
                                @can('user-activeDeactive')
                                  {{ Form::open(['route' => ['users.activeDeactive'], 'method' => 'POST']) }}
                                      {{ Form::hidden('user_id', $user->id) }}
                                      {{ Form::submit(($user->active == 0) ? 'Reactive' : 'Deactivate', ['name' => 'submit', 'class' => 'btn btn-warning']) }}
                                  {{ Form::close() }}
                                @endcan
                                  {{ Form::open(['route' => ['users.approveDisapprove'], 'method' => 'POST']) }}
                                      {{ Form::hidden('user_id', $user->id) }}
                                      {{ Form::submit(($user->approved_at == 0) ? 'Approve' : 'Disapprove', ['name' => 'submit', 'class' => 'btn btn-success']) }}
                                  {{ Form::close() }}
                   <!--              <a class='btn btn-success btn-xs' href = 'index/{{ $user->id }}'>Approve</a> -->
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>

                  </div>

                </div>
              </div>
            </div>

            <!-- Pie Chart -->

          </div>

          <!-- Content Row end here -->
  @endsection