@extends('layouts.caspad')

@section('content')

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">
            <h4>Paid Projects</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Project ID</th>
                <th>Project Length</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td> {{$loop->index+1}} </td>
                        <td> {{$row->customer_name}} </td>
                        <td> {{$row->project_id}} </td>
                        <td> {{$row->length}} </td>
                        <td> {{$row->total_amount}} </td>
                        <td> <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-check-circle"></i> Paid</button> </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
            @forelse ($Total_projects as $total)
              <h5 class="modal-title" align="center"><i>Total Amount:   <b>{{$total->total_amount}}</b></i></h5>
              @empty
            @endforelse
        </div>
        <div class="card-footer">
            <a class="btn btn-primary btn-sm" href="{{ route('getprojectsindex') }}"> <i class="fa fa-reply"></i> Back</a>
        </div>
      </div>
</div>
@endsection
