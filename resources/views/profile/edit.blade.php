@extends('layouts.caspad')

@section('content')
          <!-- Content Row start here -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                    <div class="pull-right">
                      <a class="btn btn-primary" href="{{ url('/viewprofile/'.Auth::user()->id)}}"> Back</a>
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
                  @forelse ($id as $user)
                        @empty       
                  @endforelse

                  <form role="form" {{ action('profileController@updateprofile',['id' => $user->id]) }}  method="POST" class="">
                     {{ csrf_field() }}
                    <input type="hidden"  name="id" value="{{ $user->id }}">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <strong>First Name:</strong>
                                <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>Last Name:</strong>
                              <input type="text" value="{{ $user->lastname }}" name="lastname" class="form-control" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>National ID Number:</strong>
                              <input type="text" value="{{ $user->id_number }}" name="id_number" class="form-control" maxlength="11" minlength="7" placeholder="National ID Number">
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <strong>Country:{{ $user->country }}</strong>
                                <select id="country" name="country" class="form-control input-lg dynamic" data-dependent="capitalcity" required>
                                <option value="">-- Select Country --</option>
                                @foreach($country_list as $countrydata)
                                  <option value=" {{ $countrydata->country}}">{{ $countrydata->country }}</option>
                                @endforeach
                              </select>

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <strong>Capital City:{{ $user->capitalcity }}</strong>
                                <select name="capitalcity" id="capitalcity" class="form-control input-lg"required >
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>Phone Number:</strong>
                              <input type="text" value="{{ $user->mobile }}" name="mobile" class="form-control" maxlength="13" minlength="10" placeholder="Phone Number">
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <strong>Company:</strong>
                              <input type="text" value="{{ $user->company }}" name="company" class="form-control" placeholder="Company">
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                  </form>
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
      url:"{{ route('users.fetch3') }}",
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
