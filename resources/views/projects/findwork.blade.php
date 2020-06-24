@extends('layouts.caspad')

@section('content')
<script type="text/javascript">
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
</script>

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">

        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Customer Name</th>
                <th>Project Length</th>
                <th>Pay / Min</th>
                <th>Total Pay</th>
                <th>Subject</th>
                <th>Play</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($rows as $key => $row)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td> {{$row->customer_name}} </td>
                        <td class="length"> {{$row->length}} </td>
                        <td> 0.40 </td>
                        <td id="total"></td>
                        <td> {{$row->subject}} </td>
                        <td>
                            <video id="myVideo" width="300" height="100" controls>
                              <source src="{{asset('/files/' .$row->file_name)}}" type="audio/ogg">
                              Your browser does not support HTML5 video.
                            </video>
{{--                             <audio controls>
                                <source src="{{asset('/files/' .$row->file_name)}}" type="audio/ogg">
                            </audio> --}}
                        </td>
                        <td>
                            @can('freelancer-workspace')
                                <a class="btn btn-success btn-sm" href="/workspace/{{$row->id}}">Claim
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>

          </table>
          <script type="text/javascript">
          $(document).ready(function(){
              $('tr').each(function(){
                  var total = 0;

                  $(this).find('.length').each(function(){
                      var price = $(this).text();
                      var a = price.split(':');
                      var seconds =  (+a[0]) + (+a[1]) / 60;

                      total = parseFloat(seconds) * 0.40;
                  });
                  $(this).find('#total').html(total);
              });
          });
          </script>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary btn-sm" href="{{ route('getprojectsindex') }}"> <i class="fa fa-reply"></i> Back</a>
        </div>
      </div>
</div>

<script type="text/javascript">
    var vid = document.getElementById("myVideo");
    vid.onplay = function() {
      //alert("The video has started to play");
    };
</script>
@endsection
