@extends('layouts.caspad')

@section('content')

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">
            <h4>My Earnings</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Project ID</th>
                <th>Project Length</th>
                <th>Date</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td> {{$loop->index+1}} </td>
                        <td> {{$row->project_id}} </td>
                        <td> {{$row->length}} </td>
                        <td> {{$row->updated_at}} </td>
                        <td> {{$row->total_amount}} </td>
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
