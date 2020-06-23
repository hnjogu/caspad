@extends('layouts.caspad')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">
            <h3>Posted Projects</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Project ID</th>
                <th>Project Length</th>
                <th>Subject</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($rows as $key => $row)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td> {{$row->project_id}} </td>
                        <td> {{$row->length}} </td>
                        <td> {{$row->subject}} </td>
                        <td> ${{$row->total_amount}} </td>
                        <td>
<<<<<<< HEAD
                          @can('pay-projects')
                              @if ($row->paid == 1)
                                  Paid
                              @elseif($row->paid == 0)
                                <form action="{{ url('charge') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="amount" value="{{$row->total_amount}}"/>
                                    <input type="hidden" name="project_id" value="{{$row->project_id}}"/>
                                    <input class="btn btn-warning btn-sm" type="submit" name="submit" value="Pay ${{$row->total_amount}}">
                                </form>
                              @endif
                          @endcan
                      </td>
=======
                            @can('pay-projects')
                                 @if($row->paid == 0)
                                    <a class="btn btn-warning btn-sm" href="/payment/{{ $row->id }}/pay"> <i class="fa fa-paypal"></i>  Pay ${{$row->total_amount}}</a>
                                @else
                                    Paid
                                @endif
                            @endcan
                        </td>
>>>>>>> 099b492ae9f6b2ce66a98deb7ff393dd3f36a2f5
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary btn-sm" href="{{ route('getprojectsindex') }}"> <i class="fa fa-reply"></i> Back</a>
        </div>
      </div>
</div>
@endsection
