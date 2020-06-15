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
                <th>Rating Job</th>
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
                            {{-- <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="" data-size="xs" disabled=""> --}}
                            <div class="rating">

                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs">

                                <input type="hidden" name="id" required="" value="}">

                                <span class="review-no">422 reviews</span>

                                <br/>

                                <button class="btn btn-success">Submit Review</button>

                                    <h5 class="sizes">sizes:

                                        <span class="size" data-toggle="tooltip" title="small">s</span>

                                        <span class="size" data-toggle="tooltip" title="medium">m</span>

                                        <span class="size" data-toggle="tooltip" title="large">l</span>

                                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>

                                    </h5>

                            </div>
                        </td>
                        <td>
                          @can('pdfview-completedProjects')
                            <a class="btn btn-primary" href="{{ url('/clientpdf/'.$row->id) }}" role="button"><i class="fas fa-download"></i> Download </a>
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
