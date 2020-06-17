@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
               <h1>FAQs</h1>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center blue">

                </h5>
                <p>
                            1. Do I need to create an account to access your service?
                            Yes. It’s easy and it’ll only take a minute. <br>
                                2. How much does your service cost? 
                            We charge $0.90 per audio minute for both non-verbatim and verbatim transcription.<br>
                                3. Are there any other fees?
                            No. There are no extra fees for multiple speakers or difficult audio quality. <br>
                                4. What payment options are available?
                            We accept payment via Paypal and M-Pesa.<br>
                                5. Is your transcription service automated or human transcription?
                            Human transcription. Even with advancements in speech recognition software, human transcriptionists still provide the most accurate transcription service.<br>
                                6. What’s the quality of your work?
                            Our team of professionals is well trained and guarantee a 99% accuracy.<br>
                                7. How long does it take to get my transcript?
                            The turnaround time depends on the audio length and audio quality. A good quality one hour audio normally takes at most 24 hours to transcribe. <br>
                                8. What languages are supported for transcription?
                            We currently transcribe English and Swahili audio.<br>
                                9. Do you label different speakers?
                            Yes. We label speakers for easy use of the transcript.<br>
                                10. Can you provide a verbatim transcription?  Yes. We provide verbatim transcripts with all filler words and stutters.<br>
                                11. Can you assure confidentiality?
                            Yes. Caspad has a strict confidential policy and all our clients information is kept private.<br>
                                12. How do you protect my payment information?
                            Caspad doesn’t store any of your payment information. All the payments are processed via PayPal and M-pesa.
                </p>

            </div>
            <div class="card-footer">
                <p class="text-center">&copy; <?= date('Y'); ?> Caspad Ltd.</p>
            </div>
        </div>
    </div>
@endsection
