@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Contact Us</div>
            <div class="card-body">
                    <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-8 col-lg-6 pb-5">
                                            <!--Form with header-->

                                            <form action="{{url('sendemail/send')}}" method="post">
                                                {{ csrf_field() }}
                                                <div class="card border-primary rounded-0">
                                                    <div class="card-header p-0">
                                                        <div class="bg-info text-white text-center py-2">
                                                            <h3><i class="fa fa-envelope"></i> Caspad Contact Panel</h3>
                                                            <p class="m-0">Feel free to contact us anytime.</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-3">

                                                        <!--Body-->
                                                        <div class="form-group">
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                                </div>
                                                                <input type="text" class="form-control" id="nombre" name="name" placeholder="Full names" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                                                </div>
                                                                <input type="email" class="form-control" id="nombre" name="email" placeholder="E-mail" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                                                </div>
                                                                <textarea class="form-control" name="message" placeholder="Your message / comments" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="text-center">
                                                            <input type="submit" value="Submit" class="btn btn-info btn-block rounded-0 py-2">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                            <!--Form with header-->


                                        </div>
                            </div>
                        </div>
            </div>
            <div class="card-footer"> <small> &copy; <?= date('Y');?>, Caspad Limited. </small></div>
        </div>
    </div>
@endsection
