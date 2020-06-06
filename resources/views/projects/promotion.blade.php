@extends('layouts.caspad')

@section('content')

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success">
            <h3>Promotions</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Promotion Code</th>
                <th>Promotion Amount</th>
                <th>Expiry Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="10">You currently don't have any promotion.</td>
                </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary btn-sm" href="{{ route('getprojectsindex') }}"> <i class="fa fa-reply"></i> Back</a>
        </div>
      </div>
</div>
@endsection
