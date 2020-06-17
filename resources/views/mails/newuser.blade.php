 
<!DOCTYPE html>
<html>
<head>
    <title>Caspad Transcription</title>
</head>

<body>
<h2>Caspad Transcription Account details</h2>
<br/>
Dear Admin. New user has registered with Caspad Transcription.
Kindly confirm the details provided and follow the link below to activate the account.
<a href="https://caspad.com/users">Activate New user</a><br>
Username is {{$user->email}}}<br>
Names: {{$user->name}} {{$user->lastname}}<br>
Mobile Phone {{$user->mobile}}<br>
<!-- <img src="{{ URL::to('/images/caspad.jfif') }}"  alt="Logo" title="Logo" style="display:block" width="200" height="87"> -->
<img src="{{ public_path('image/caspad.jfif') }}"  alt="Logo" title="Logo" style="display:block" width="200" height="87"/>

</body>

</html>