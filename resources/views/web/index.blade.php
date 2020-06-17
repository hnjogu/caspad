@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('inc.carousel')
    </div>
    <div class="container-fluid mt-4 text-center">
        <div class="jumbotron new-link">
            <h1 class="upper border-bottom border-primary border-width-20">Popular Transcription Services</h1>
            <div class="row mt-4">
                <div class="col-md-4">
                    <img src="{{asset('storage/images/medical.png')}}" class="icons">
                    <h3 class="mt-4 text-success"> <a href="/register">Medical Transcription</a> </h3>
                    <p>
                        Are you a physician, nurse or healthcare practitioner and need your voice-recorded medical reports transcribed?
                    </p>
                    <a class="btn btn-info btn-sm mt-2" href="/medical">Learn More &raquo;</a>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('storage/images/research.png')}}" class="icons">
                    <h3 class="mt-4 text-success"> <a href="/register">Market Research Transcription</a> </h3>
                    <p>
                      Market research transcription involves converting the audio data collected during research into an easily readable market research document.
                    </p>
                    <a class="btn btn-info btn-sm mt-2" href="/research">Learn More &raquo;</a>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('storage/images/business.png')}}" class="icons">
                    <h3 class="mt-4 text-success"> <a href="/register">Business Transcription</a> </h3>
                    <p>
                        Business transcription involves transcribing of business recordings. This may include; Phones calls, interviews, webinars and more.
                    </p>
                    <a class="btn btn-info btn-sm mt-2" href="/business">Learn More &raquo;</a>
                </div>
            </div>

            <!-- second row  -->
            <div class="row mt-6">
                <div class="col-md-4">
                    <img src="{{asset('storage/images/academic.png')}}" class="icons">
                    <h3 class="mt-4 text-success"> <a href="/register">Academic Transcription</a> </h3>
                    <p>
                      Research institutions and professional educators can all benefit from our transcription services.
                    </p>
                    <a class="btn btn-info btn-sm mt-2" href="/academic">Learn More &raquo;</a>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('storage/images/legal.png')}}" class="icons">
                    <h3 class="mt-4 text-success"> <a href="/register">Legal Transcription</a> </h3>
                    <p>
                      Legal professionals such as attorneys and court reporters usually handle large volumes of recorded materials,  which require to be transcribed for easier reference.
                    </p>
                    <a class="btn btn-info btn-sm mt-2" href="/legal">Learn More &raquo;</a>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('storage/images/podcast.png')}}" class="icons">
                    <h3 class="mt-4 text-success"> <a href="/register">Podcast Transcription</a> </h3>
                    <p>
                          Using our podcast transcription services is one way to give your podcast a competitive advantage.
                    </p>
                    <a class="btn btn-info btn-sm mt-2" href="/podcast">Learn More &raquo;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="jumbotron text-center">
          <h1 class="upper">Why Caspad?</h1>
            <hr class="my-2">
            <div class="row mt-4">
              <div class="col-md-4">
                  <img src="{{asset('storage/images/price.png')}}" class="icons">
                  <h3 class="mt-4 text-success">Price Transparency</h3>
                  <p>
                      Our cost calculator enables you to know the cost before purchasing.
                  </p>
              </div>
              <div class="col-md-4">
                  <img src="{{asset('storage/images/confidential.png')}}" class="icons">
                  <h3 class="mt-4 text-success">Confidential</h3>
                  <p>
                        Your content is protected. All our professionals have signed a non-disclosure agreement.
                  </p>
              </div>
              <div class="col-md-4">
                  <img src="{{asset('storage/images/quality.png')}}" class="icons">
                  <h3 class="mt-4 text-success">Guaranteed High Quality</h3>
                  <p>
                        Our team is well-trained to ensure the highest quality.
                  </p>
              </div>
            </div>

            <!-- second row -->
            <div class="row mt-4">
              <div class="col-md-4">
                  <img src="{{asset('storage/images/support.png')}}" class="icons">
                  <h3 class="mt-4 text-success">Support and Customer Service</h3>
                  <p>
                      Our support team is always available to assist you. Contact us at any time.
                  </p>
              </div>
              <div class="col-md-4">
                  <img src="{{asset('storage/images/turnaround.png')}}" class="icons">
                  <h3 class="mt-4 text-success">Quick Turnaround</h3>
                  <p>
                        Our professionals are always standby to work on your order. 15 hours turnaround time.
                  </p>
              </div>
            </div>
        </div>
    </div>
@endsection
