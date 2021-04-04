
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Admin</title>
</head>

<body>

    <h2 style="color:#656565; font-size:25px; margin:0 0 20px; font-weight: bold;">Hi {{ $user->name }},</h2>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        Your password has been reset successfully.
    </p>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        <br />
        If you did not request password change ,please contact your administrator.
    </p>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        <br />
        Thanks, <br />
        Team 
    </p>
</body>
</html>

