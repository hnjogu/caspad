@extends('layouts.caspad')

@section('content')
          <!-- Content Row start here -->


          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Show Role</h6>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ url('/showpermissions') }}"> <i class="fa fa-reply"></i> Back</a>
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
                  <div class="panel panel-default">
                    <div class="panel-body" contenteditable="false">
                       <form role="form" {{ action('PermissionsController@createpermissions') }} method="POST" class="">
                        {{ csrf_field() }}
                           <input type="hidden"  name="user_name" value="{{ Auth::user()->name}}">
                           <div class="form-group">
                               <table class="">
                                   <tbody>
                                       <tr>
                                           <td style="width:100px;">
                                               <label for="exampleInputEmail1" class="">Permission Name:</label>
                                           </td>
                                           <td>
                                               <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Permission Name" style="display:inline;width:500px;">
                                           </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                           <div class="form-group">
                               <table class="">
                                   <tbody>
                                       <tr>
                                           <td style="width:100px;">
                                               <label for="exampleInputEmail1" class="">Permission Guard:</label>
                                           </td>
                                           <td>
                                               <select class="mdb-select md-form" name="guard_name">
                                                <option value="" disabled selected>Choose Permission Guard</option>
                                                <option value="web">web</option>
                                              </select>
                                           </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                           <div class="text-center">
                               <button type="submit" class="btn btn-success btn-sm">Submit</button>
                              <!--  <a href="{{ url('/home') }}" class="btn btn-primary" role="button">Exit</a> -->
                           </div>
                       </form>
                   </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->

          </div>

           <!-- Content Row end here -->
  @endsection