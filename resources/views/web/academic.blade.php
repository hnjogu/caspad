@extends('layouts.app')

@section('content')
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Popular Transcription Services</a></li>
          <li class="breadcrumb-item active" aria-current="page">Academic Transcription</li>
        </ol>
      </nav>
        <div class="card">
            <div class="card-header text-center">
               <h1>POPULAR TRANSCRIPTION SERVICES</h1>
            </div>
            <div class="card-body">
              <h2 class="text-success">Academic Transcription</h2>
              <p>
                Research institutions and professional educators can all benefit from our transcription services. We deliver accurate transcripts in a timely manner, thus taking up some of your work load, so you can focus on other matters. The academic field involves a lot of audio-recorded material, which require to be transcribed for reference purposes, reports compilation or record keeping. Caspad offers quality transcription for the following:
                <ul>
                    <li>One-on-one Interviews.</li>
                    <li>Focus Groups.</li>
                    <li>Lectures and Presentations.</li>
                    <li>Dissertation Interviews.</li>
                    <li>Group Discussions.</li>
                    <li>All Academic Meetings.</li>
                </ul>
                We understand that most scholars and researchers operate on a budget, thus our rates of $0.90 per audio minute are very friendly. Graduate students, researchers and teachers can therefore take advantage of our low, flat rates. We can handle any volume of educational transcription orders, including audios containing multi-speakers.
              </p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-sm" href="/"> <i class="fa fa-reply"></i> Back</a>

            </div>
        </div>
    </div>
@endsection
