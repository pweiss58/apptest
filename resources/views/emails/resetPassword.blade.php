<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<h2>Welcome to the site {{$user['name']}}</h2>
<br/>
Your registered email is {{$user['email']}} , Please click on the below link to reset your password.
<br/>
<a href="{{url('user/reset', $user->pwResetToken)}}">{{url('user/reset', $user->pwResetToken)}}</a>
</body>
</html>