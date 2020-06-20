<!DOCTYPE html>
<html lang="en">

<head>
    <title>Caspad Transcription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>

    h1, h6 {
        margin: 2px;
    }
    th{
        font-weight: normal;
    }
    width: 100%;
    }
    ol,
    ul {
        columns: 3;
    }
</style>
<body>

                        @forelse ($Project as $Project)
                        <!--   {{$Project->id}} -->

                          @empty
                        @endforelse

  <div>
    <!-- <h6 align="center">Caspad</h6> -->
    <h6 align="left">
        @if($Project->status == 'Completed')
          <span class="badge badge-info">Completed</span>
        @endif
    </h6>
    <div style="text-align: center;">
    	<img src="{{ public_path('image/caspad.jfif') }}"  height="60px" height="60px" />
    	<!-- <img src="{{ asset('image/caspad.png') }}" alt="Caspad" height="60px" width="60px"> -->
    </div>
  </div>
  <div class="container">
      <div class="row">
        <div class="card-body p-0">
          <!--hr class="my-5"-->
          <div class="row pb-5 p-5">
            <div class="col-md-6 text-center">
              <!--  <h4><p class="font-weight-bold mb-1">Plantation Location Details</p></h4> -->
              <p class="mb-1"><b>Serial Number</b>: {{$Project->project_id}}</p>
              <p class="mb-1"><b>Name</b>: {{$Project->customer_name}}</p>
            </div>
          </div>
        </div>

	            <table class="table table-striped table-bordered"cellspacing="1" width="100%">
		            <thead>
		                <tr>
		                    <th></th>
		                </tr>
		            </thead>
		            <tbody>
		              <tr>
		                  <td>{!!$Project->body!!}</td>
		              </tr>
		            </tbody>
	            </table>

      </div>
  </div>
<script>
    var today = new Date();
    document.getElementById('time').innerHTML=today;
</script>
</body>

</html>

