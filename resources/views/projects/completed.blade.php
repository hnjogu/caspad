@extends('layouts.caspad')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


<div class="mt-4">
    <div class="card">
        <div class="card-header bg-success">
            <h4 class="text-center">Completed Projects</h4>
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
                <th>Status</th>
                <th>Rate Job</th>
                <th>Options</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td> {{$loop->index+1}} </td>
                        <td> {{$row->project_id}} </td>
                        <td> {{$row->length}} </td>
                        <td> {{$row->subject}} </td>
                        <td> {{$row->total_amount}} </td>
                        <td>
                            @if($row->rate == 0)
                              <a class="btn btn-warning btn-sm" href="{{ url('/rate/'.$row->id) }}"> <i class="fa fa-star"></i> Rate  </a>
                            @else
                              <a class="btn btn-success btn-sm" href="!#"> <i class="fa fa-check-circle"></i> Rated  </a>
                            @endif
                        </td>
                        <td>
                          @can('pdfview-completedProjects')
                            <a class="btn btn-primary btn-sm" href="{{ url('/clientpdf/'.$row->id) }}" role="button"><i class="fas fa-download"></i> Download </a>
                          @endcan
                        </td>
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

<script type="text/javascript">

    $("#input-id").rating();

</script>
@endsection
