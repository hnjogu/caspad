@extends('layouts.app')

@section('content')
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Popular Transcription Services</a></li>
          <li class="breadcrumb-item active" aria-current="page">Business Transcription</li>
        </ol>
      </nav>
        <div class="card">
            <div class="card-header text-center">
               <h1>POPULAR TRANSCRIPTION SERVICES</h1>
            </div>
            <div class="card-body">
              <h2 class="text-success">Business Transcription</h2>
              <p>
                  Business transcription involves transcribing of business recordings. This may include; Phones calls, interviews, focus groups, webinars, board meetings, seminars, teleseminars, tele classes, presentations, workshops, personal notes, meeting notes, conferences and more. Business transcription assists businesses to keep accurate records since it ensures all what was said is available, which can help a lot for future referencing and when creating marketing strategies. Business recordings mostly have multiple speakers, but don’t worry, unlike other transcription services, we don’t charge extra for multiple speakers. Our customers include; marketing professionals, business coaches, business owners and more. Caspad’s business transcription service has been designed thinking carefully about the needs of those in search for business transcription. Our transcribers are highly skilled to ensure you get a nicely edited and formatted transcript for easy readability. All information is kept confidential.
              </p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-sm" href="/"> <i class="fa fa-reply"></i> Back</a>

            </div>
        </div>
    </div>
@endsection
