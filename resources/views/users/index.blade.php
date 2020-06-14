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
                           <th>#</th>
                           <th>Names</th>
                           <th>Mobile</th>
                           <th>Email</th>
                           <th>Status</th>
                           <th>Type</th>
                           <th>Roles</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($data as $key => $user)
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->mobile }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                              @if($user->approved_at == '1')
                                <span class="badge badge-success">Approved</span>
                              @endif
                              @if($user->approved_at == '0')
                                <span class="badge badge-warning">Not Approved</span>
                              @endif
                          </td>
                          <td>{{ $user->type }}</td>
                          <td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                 <label class="badge badge-success">{{ $v }}</label>
                              @endforeach
                            @endif
                          </td>
                          <td>
                             <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"> <i class="fa fa-eye"></i> </a>
                                @can('user-edit')
                                  <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('user-delete')
                                  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                  {!! Form::close() !!}
                                @endcan
                                @can('user-activeDeactive')
                                  {{ Form::open(['route' => ['users.activeDeactive'], 'method' => 'POST']) }}
                                      {{ Form::hidden('user_id', $user->id) }}
                                      {{ Form::submit(($user->active == 0) ? 'Reactive' : 'Deactivate', ['name' => 'submit', 'class' => 'btn btn-warning btn-sm']) }}
                                  {{ Form::close() }}
                                @endcan
                                @can('user-approveDisapprove')
                                  {{ Form::open(['route' => ['users.approveDisapprove'], 'method' => 'POST']) }}
                                      {{ Form::hidden('user_id', $user->id) }}
                                      {{ Form::submit(($user->approved_at == 0) ? 'Approve' : 'Disapprove', ['name' => 'submit', 'class' => 'btn btn-success btn-sm']) }}
                                  {{ Form::close() }}
                                @endcan
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
