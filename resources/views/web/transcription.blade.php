@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1 class="display-3 text-center">Professional Transcription Services.</h1>
            <p class="lead text-center">100% Human Generated Transcripts.</p>
            <hr class="my-2">
            <h2>Transcription </h2>
            <p>
                <ul>
                    <li>Convert your audio recordings into transcripts for $0.90 per audio minute.</li>
                    <li>100+ professional transcriptionists with vast knowledge in various industries.</li>
                    <li>15Hrs turnaround time.</li>
                    <li>99% accuracy.</li>
                </ul>
            </p>
        </div>

        <div class="jumbotron">
            <h2 class="text-center display-3">How it Works</h2>
            <hr class="my-2">
            <h2> 1. <a href="/register"> Upload Audio </a> </h2>
            <p>
                <ul>
                    <li>Once you create an account, go to your dashboard to upload an audio recording.</li>
                    <li>Select your preferred transcription type (Verbatim or non-verbatim) </li>
                    <li>Include a glossary. This includes speaker names, technical terms and abbreviations, and any other instructions regarding formatting of the transcript.</li>
                    <li>Our automated cost calculator computes total transcription cost.</li>
                    <li>Make payment. PayPal is our accepted method of payment.</li>
                    <li>Complete Upload.</li>
                </ul>
            </p>
        </div>

        <div class="jumbotron">
            <hr class="my-2">
            <h2> 2. Professional Transcription </h2>
            <p>
                <ul>
                    <li>The audio recording is analyzed to be matched with the perfect transcriptionist for its category.</li>
                    <li>Professional transcriptionist works on the file to produce a transcript.</li>
                    <li>The transcript is reviewed to ensure it guarantees 99% accuracy and submitted.</li>
                </ul>
            </p>
        </div>

        <div class="jumbotron">
            <hr class="my-2">
            <h2> 3. Download Your Transcript </h2>
            <p>
                <ul>
                    <li>We notify you via email when your transcript is ready.</li>
                    <li>Download your transcript in PDF format.</li>
                </ul>
                The whole process takes 15 hours for audio recordings 40 minutes long or shorter.
            </p>
        </div>

        <div class="jumbotron">
            <h2 class="text-center display-3">Types of Transcriptions</h2>
            <hr class="my-2">
            <h2> 1. <strong>Verbatim:</strong> Every spoken word is captured. </h2>
            <p>
                <ul>
                    <li>All speech is captured word for word from the beginning to the end.</li>
                    <li>Filler words, false starts and stutters are included. E.g., uh, um.</li>
                    <li>Some non-speech sounds are captured. E.g., laughter.</li>
                </ul>
                The transcript is long and speech patterns don’t flow well making it hard to read.
            </p>

            <h2> 2. <strong>Non-Verbatim:</strong> Clean read version transcript. </h2>
            <p>
                Non-verbatim captures only what the speaker actually intended to say. This is our default style for all transcription services and the most commonly requested transcription.

                <ul>
                    <li>The whole recording is captured without paraphrasing or grammar correction.</li>
                    <li>Filler words, false starts and stutters are omitted.</li>
                    <li>Non-speech sounds are omitted.</li>
                </ul>
                Preserves context and meaning of every sentence in the recording while ensuring the readability of the transcript.
            </p>
        </div>


    </div>
@endsection
