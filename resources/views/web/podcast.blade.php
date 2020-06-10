@extends('layouts.app')

@section('content')
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Popular Transcription Services</a></li>
          <li class="breadcrumb-item active" aria-current="page">Podcast Transcription</li>
        </ol>
      </nav>
        <div class="card">
            <div class="card-header text-center">
               <h1>POPULAR TRANSCRIPTION SERVICES</h1>
            </div>
            <div class="card-body">
              <h2 class="text-success">Podcast Transcription</h2>
              <p>
                Using our podcast transcription services is one way to give your podcast a competitive advantage. A transcript posted alongside your podcast is a way of enriching your content by enabling listeners to follow along. Transcripts also increase your audience to reach those who maybe unable to listen. On top of that, you will have easy access to your podcasts’ archives for integration into eBooks and compiling reports which also serves as a record for all your podcasts interviews and proceedings.
                Our 15Hrs turnaround time for podcast transcriptions ensures that you can post your podcast together with a transcript for every episode. Our transcriptionists have vast knowledge in various topics; therefore, your podcast will be matched with an experienced transcriptionist for the topic of discussion. However, we encourage you to include a glossary for guests’ names and technical terms to achieve utmost accuracy. Caspad maintains a flat rate cost per audio minute for all transcriptions and our automated cost calculator ensures transparency and accuracy in payments.
              </p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-sm" href="/"> <i class="fa fa-reply"></i> Back</a>

            </div>
        </div>
    </div>
@endsection
