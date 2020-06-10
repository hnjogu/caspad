@extends('layouts.app')

@section('content')
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Popular Transcription Services</a></li>
          <li class="breadcrumb-item active" aria-current="page">Medical Transcription</li>
        </ol>
      </nav>
        <div class="card">
            <div class="card-header text-center">
               <h1>POPULAR TRANSCRIPTION SERVICES</h1>
            </div>
            <div class="card-body">
              <h2 class="text-success">Medical Transcription</h2>
              <p>
                  Are you a physician, nurse or healthcare practitioner and need your voice-recorded medical reports transcribed? No need to worry. At Caspad, our professionals have undergone medical transcription training which includes coursework in medical terminology, anatomy, editing and proofreading, grammar and punctuation, typing, medical record types and formats, and healthcare documentation. Our professionals will perform document typing and formatting functions, transcribing the spoken words into a written, easily readable form, and make sure you receive the completed documents in a timely fashion. We don’t charge extra for multiple speakers or for audio recording with background noise. At Caspad, we understand medical recordings contain very sensitive information and that’s why we ensure all information is kept confidential.
              </p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-sm" href="/"> <i class="fa fa-reply"></i> Back</a>

            </div>
        </div>
    </div>
@endsection
