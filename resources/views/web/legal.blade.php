@extends('layouts.app')

@section('content')
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Popular Transcription Services</a></li>
          <li class="breadcrumb-item active" aria-current="page">Legal Transcription</li>
        </ol>
      </nav>
        <div class="card">
            <div class="card-header text-center">
               <h1>POPULAR TRANSCRIPTION SERVICES</h1>
            </div>
            <div class="card-body">
              <h2 class="text-success">Legal Transcription</h2>
              <p>
                Legal professionals such as attorneys, paralegals and court reporters usually handle large volumes of recorded materials, which required to be transcribed for easier reference. Typed documents are easier for digital referencing and they can also be easily printed as needed. We have transcriptionists who are well trained and understand legal terminologies and procedures in order to ensure we deliver quality and accurate transcripts. In all legal matters, confidentiality is crucial, therefore all our transcriptionists have to sign a confidentiality agreement to ensure privacy of all information contained in your audio recordings.
                Attorneys are frequently faced with the challenge of tight deadlines and schedules. Using our transcription services will help you and your staff focus on other professional matters, while we work to deliver your transcripts in time. Our cost calculator ensure transparency in all our transactions. We have transcription experience in the following:

                <ul>
                    <li>Court Proceedings.</li>
                    <li>Depositions.</li>
                    <li>Audio-recorded evidence.</li>
                    <li>Public Hearings.</li>
                    <li>Judicial Hearings.</li>
                    <li>Arbitrations.</li>
                    <li>Interrogations.</li>
                </ul>
              </p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-sm" href="/"> <i class="fa fa-reply"></i> Back</a>

            </div>
        </div>
    </div>
@endsection
