@extends('layouts.caspad')

@section('content')
          <!-- Content Row start here -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create New User</h6>
                    <div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                         @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                    </div>
                  @endif



                  {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                  <div class="row">
                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>First Name:</strong>
                              {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <strong>National ID Number:</strong>
                            {!! Form::text('id_number', null, array('placeholder' => 'National ID Number','maxlength' => '8','minlength' => '7','class' => 'form-control')) !!}
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <strong>Country:</strong>
                              <select id="country" name="country" class="form-control input-lg dynamic" data-dependent="capitalcity">
                              <option value="">-- Select Country --</option>
                              @foreach($country_list as $countrydata)
                                <option value=" {{ $countrydata->country}}">{{ $countrydata->country }}</option>
                              @endforeach
                            </select>

                          </div>
                      </div>
                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <strong>Capital City:</strong>
                              <select name="capitalcity" id="capitalcity" class="form-control input-lg" >
                              </select>
                          </div>
                      </div>

                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <strong>Type:</strong>
                              <select id="type" name="type" class="form-control input-lg" required>
                              <option value="">-- Select Type --</option>
                                <option value="Freelancer">Freelancer</option>
                                <option value="Graders">Graders</option>
                                <option value="Client">Client</option>
                            </select>

                          </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <strong>Phone Number:</strong>
                            {!! Form::text('mobile', null, array('placeholder' => 'Phone Number','maxlength' => '13','class' => 'form-control')) !!}
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <strong>Company:</strong>
                            {!! Form::text('company', null, array('placeholder' => 'Company','class' => 'form-control')) !!}
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>Email:</strong>
                              {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>Password:</strong>
                              {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>Confirm Password:</strong>
                              {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Role:</strong>
                              {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>

            <!-- Pie Chart -->

          </div>

          <!-- Content Row end here -->
  @endsection


<!--- dropdown start here -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
   $('.dynamic').change(function(){
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
     var _token = $('input[name="_token"]').val();
     $.ajax({
      //url:"{{ route('users.fetch') }}",
      url:"{{ route('users.fetch') }}",
      method:"get",
      data:{select:select, value:value, _token:_token, dependent:dependent},
      success:function(result)
      {
       $('#'+dependent).html(result);
      }
     })
    }
   });
   $('#country').change(function(){
    $('#capitalcity').val('');
   });
  });
</script>
<!--- dropdown end here -->