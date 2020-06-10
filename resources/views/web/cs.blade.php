@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
               <h1>CUSTOMER SERVICE</h1>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center blue">

                </h5>
                <p>
                        Customer service and satisfaction is key to Caspad. Apart from ensuring you have safe and secure transactions, we pride in customer satisfaction and a seamless experience using our services thus we are reachable on phone and online to address any of your concerns. We also offer dispute resolution incase our clients (customers & freelancers) have a misunderstanding and strive to find solutions even if it falls outside of normal company protocol.
                </p>
                <p class="text-success">
                    E-mail: info@caspad.com
                </p>
                <p class="text-success">
                    Mobile: +254728515189
                </p>

            </div>
            <div class="card-footer">
                <p class="text-center">&copy; <?= date('Y'); ?> Caspad Ltd.</p>
            </div>
        </div>
    </div>
@endsection
