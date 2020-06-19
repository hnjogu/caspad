@extends('layouts.caspad')

@section('content')

<div class="mt-4">
    <div class="card">
        <div class="card-header bg-success">
            <h4 class="text-center">Posted Projects</h4>
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
                <th>Date</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td> {{$loop->index+1}} </td>
                        <td> {{$row->customer_name}} </td>
                        <td> {{$row->project_id}} </td>
                        <td> {{$row->length}} </td>
                        <td> {{$row->created_at}} </td>
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
