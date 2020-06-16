@extends('layouts.caspad')

@section('content')
  <div class="mt-4">
      <div class="card">
          <div class="card-header">
              <h2 class="text-center text-success">Rated Project</h2>
          </div>
          <div class="card-body">
              <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project ID</th>
                      <th>Rate</th>
                      <th>Length</th>
                      <th>Freelancer</th>
                      <th>Grader</th>
                      <th>Customer</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            <td> {{$loop->index+1}} </td>
                            <td> {{$row->project_id}} </td>
                            <td> {{$row->rate}} </td>
                            <td> {{$row->length}} </td>
                            <td> {{$row->freelancer_id}} </td>
                            <td> {{$row->grader}} </td>
                            <td> {{$row->customer_name}} </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          <div class="card-footer">

          </div>
      </div>
  </div>
@endsection
