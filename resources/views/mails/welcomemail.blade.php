<!DOCTYPE html>
<html>
<head>
    <title>Caspad Transcription</title>
</head>

<body>
<h2>Welcome to Caspad Transcription</h2>
<br/>
Your Username is {{$user->email}}<br>
Applicant  Name {{$user->name}} {{$user->lastname}}<br>
Mobile Phone {{$user->mobile}}<br>
Admin will process your registration and notify you through your email when the account has been approved within 24 hours.<br>
<i>This is a system generated email.Please Dont Reply.</i><br>
<img src="{{ public_path('image/caspad.jfif') }}"  alt="Logo" title="Logo" style="display:block" width="200" height="87"/>

</body>

</html>