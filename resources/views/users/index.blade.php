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
    <!--new panel start here -->
              <div class="container w3-animate-opacity">
                <div class="tab">
                  <button class="tablinks" onclick="openCity(event, 'all')">Not Approved Users:({{count($data)}})</button>
                  <button class="tablinks" onclick="openCity(event, 'Damaged')">Approved users:({{count($approved_data)}})</button>
                </div>
                <!-- Not Approved Users start here -->
                    <div id="all" class="tabcontent">
                     <!--  <table class="table table-bordered"> -->
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
                <!-- Not Approved Users end here -->
                <!-- Approved users start here -->
                    <div id="Damaged" class="tabcontent w3-animate-opacity">
                     <!--  <table class="table table-bordered"> -->
                      <div class="table-responsive">
                        <table id="dev-table1" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                             @foreach ($approved_data as $key => $approved)
                            <tr>
                              <td>{{ $key +1 }}</td>
                              <td>{{ $approved->name }}</td>
                              <td>{{ $approved->mobile }}</td>
                              <td>{{ $approved->email }}</td>
                              <td>
                                  @if($approved->approved_at == '1')
                                    <span class="badge badge-success">Approved</span>
                                  @endif
                                  @if($approved->approved_at == '0')
                                    <span class="badge badge-warning">Not Approved</span>
                                  @endif
                              </td>
                              <td>{{ $approved->type }}</td>
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
                                      <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$approved->id) }}"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('user-delete')
                                      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $approved->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                      {!! Form::close() !!}
                                    @endcan
                                    @can('user-activeDeactive')
                                      {{ Form::open(['route' => ['users.activeDeactive'], 'method' => 'POST']) }}
                                          {{ Form::hidden('user_id', $approved->id) }}
                                          {{ Form::submit(($approved->active == 0) ? 'Reactive' : 'Deactivate', ['name' => 'submit', 'class' => 'btn btn-warning btn-sm']) }}
                                      {{ Form::close() }}
                                    @endcan
                              </td>
                            </tr>
                           @endforeach
                          </tbody>
                        </table>

                      </div>
                    </div>
                  <!-- Approved users end here -->

                  </div>
    <!--new panel end here --->
                </div>
              </div>
            </div>

            <!-- Pie Chart -->

          </div>

          <!-- Content Row end here -->
          <!-- tabs start here-->

<style type="text/css">
  .tab {overflow: hidden; border: 1px solid #ccc; 
  background-color: #f1f1f1;}

  .tabcontent {display: none; padding: 6px 12px; border: 1px solid #ccc;
      border-top: none;}
      
  .tab button {background-color: inherit; float: left; border: none;
      outline: none; cursor: pointer; padding: 14px 16px; 
      transition: 0.3s;}
      
  .tab button:hover {background-color: #ddd;}

  .tab .active {background-color: #ccc;}

  .tabcontent {display: none; padding: 6px 12px;

  border: 1px solid #ccc; border-top: none;}

  table {font-family: arial, sans-serif; border-collapse: collapse;
      width: 100%;}

  td, th {border: 1px solid #dddddd; padding: 8px; 
      text-align: center;}

  /*Change color to gray*/
  tr:nth-child(even) {
      background-color: #dddddd;}

  .actived a{color:green}
  .actived a:hover{ font-weight: bold}

  .deactivated a{color:red}
  .deactivated a:hover{ font-weight: bold}

  .available {color:green; }
  .disable{ color: red; font-weight: bold}
  .intraining{color: blue; font-weight: bold}
  .vacation{ font-weight: bold}
</style>

<script type="text/javascript">
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";}
        
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");}

  document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";}
</script>

<script type="text/javascript">
   // $('#inactive_accounts2').DataTable().order([0, 'desc']).draw();
   $('#dev-table1').dataTable( {
       "aaSorting": [],
       "paging": true
   } );
</script>


<!-- tabs end here-->
  @endsection
