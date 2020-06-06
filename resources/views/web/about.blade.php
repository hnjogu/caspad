@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('storage/pics/banner.jpg') }}" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 text-center">About us</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>

    <div class="container-fluid mt-3">
        <div class="jumbotron">
            <hr class="my-2">
            <p>
              Caspad is an online transcription company based in Kenya. We offer human-generated English transcripts for our clients with an average turnaround time of 24 hours for audio recordings below one hour.
                Our website is very user friendly. Once you create an account, you will be able to upload your audio and include any specifications/details regarding how you wish your transcript to be delivered. (For example, Verbatim or non-verbatim). Once your transcript is completed, you can download it in PDF format. You will also be able to view and download previous transcripts from your account.
                At Caspad, we have a team of professional transcriptionists who deliver high quality transcripts. Our team is very diverse therefore conversant with a variety of topics; we encourage clients to provide a glossary for any technical terms in their recordings, so that we can deliver transcripts with utmost accuracy. After our professionals have completed transcribing the file, the transcript goes through a quality control process to ensure the perfomed service is up to standard.
                Each member of our team has to sign a confidentiality agreement to ensure that all clients' information and all contents of recordings remain confidential.
                With Caspad, you make payments via PayPal and our prices are very competitive. We <strong>charge $0.90 per audio minute</strong>.
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="/contact" role="button">Contact Us</a>
            </p>
        </div>
    </div>
@endsection
