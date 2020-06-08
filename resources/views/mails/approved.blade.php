<!DOCTYPE html>
<html>
<head>
    <title>Caspad Transcription</title>
</head>

<body>
<h2>Caspad Transcription Account Approved</h2>
<br/>
Dear User. New business account has been approved and confirmed by the Administrator.<br>
Your Username is {{$user->email}}<br>
Applicant  Name {{$user->name}} {{$user->lastname}}<br>
Mobile Phone {{$user->mobile}}<br>
<a href="http://0.0.0.0:8060/login">Login Now</a><br>
<i>This is a system generated email.Please Dont Reply.</i><br>
<img src="{{ public_path('image/caspad.jfif') }}"  alt="Logo" title="Logo" style="display:block" width="200" height="87"/>
</body>
</html>