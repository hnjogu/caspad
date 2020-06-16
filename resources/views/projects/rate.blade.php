@extends('layouts.caspad')

@section('content')
  <div class="mt-4">
      <div class="card">
          <div class="card-header">
              <h2 class="text-center text-success">Rate Project</h2>
          </div>
          <div class="card-body">
              <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project ID</th>
                      <th>Length</th>
                      <th>Rate</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form class="" action="{{route('rate.store', $row->id)}}" method="post">
                      @csrf
                      {{ method_field('POST') }}
                          <tr>
                              <td> 1 </td>
                              <td> {{$row->project_id}} </td>
                              <td> {{$row->length}} </td>
                              <td>
                                  <div class="form-group">
                                    <select name="rate" class="form-control" id="exampleFormControlSelect1">
                                      <option selected disabled>Rate</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                    </select>
                                  </div>
                              </td>
                              <td>
                                  <button type="submit" class="btn btn-sm btn-success" name="button">Submit</button>
                              </td>
                          </tr>
                      </form>
                  </tbody>
              </table>
          </div>
          <div class="card-footer">

          </div>
      </div>
  </div>
@endsection
