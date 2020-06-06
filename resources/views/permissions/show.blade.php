@extends('layouts.caspad')

@section('content')
          <!-- Content Row start here -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Permissions Management</h6>
                    <div class="pull-right">
                      @can('permissions-create')
                        <a class="btn btn-success btn-sm" href="{{ url('/getpermissions') }}"> <i class="fa fa-plus"></i> Add New Permissions</a>
                      @endcan
                     
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                  @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                  @if ($errors->any())
                    <div class="alert alert-danger" id="error">
                      <ul> 
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div><br />
                  @endif


                  <table id="dev-table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                         <th>No</th>
                         <th>Name</th>
                         <th width="280px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach ($permissions as $key => $permission)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="text-center">
                              @can('permissions-edit')
                                <a class='btn btn-info btn-xs' href="{{ url('/geteditpermissions/'.$permission->id)}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                              @endcan
                              @can('permissions-delete')
                              <a class='btn btn-danger btn-xs' href = 'showpermissions/{{ $permission->id }}'>Delete</a>
                              @endcan
                             
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>


         
                </div>
              </div>
            </div>

            <!-- Pie Chart -->

          </div>

           <!-- Content Row end here -->
  @endsection