<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<h2>Welcome to the site {{$user['name']}}</h2>
<br/>
Your registered email is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('user/verify', $user->token)}}">{{url('user/verify', $user->token)}}</a>
</body>
</html>