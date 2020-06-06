@extends('layouts.caspad')

@section('content')

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">

        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Project Length</th>
                <th>Pay / Min</th>
                <th>Total Pay</th>
                <th>Subject</th>
                <th>Options</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td> {{$row->customer_name}} </td>
                        <td> {{$row->length}} </td>
                        <td> 0.40 </td>
                        <td> {{$row->total_amount}} </td>
                        <td> {{$row->subject}} </td>
                    <td> <a class="btn btn-success btn-sm" href="/workspace/{{$row->id}}">Claim</a> </td>
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
