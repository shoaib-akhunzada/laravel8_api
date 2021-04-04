
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Tutoria Admin</title>
    <style>
        body{padding:0; margin:0;}
    </style>
</head>

<body style="background:#495A62; font-family:  Calibri ">

        <table style="max-width:700px; padding:0; border:none; margin: 0 auto; border-spacing: 0; border-collapse: collapse;">
            <tr>
                <td style="padding:10px 30px; background:#F6F6F6; position: relative;">
                    <img src="{{ asset('assets/email-template/images/logo.png') }}" alt="">

                    <span style="position: absolute; top:23px; right: 15px; ">
                        <a href="#" style="padding: 0 5px;"><img src="{{ asset('assets/email-template/images/facebook.png') }}"></a>
                        <a href="#" style="padding: 0 5px;"><img src="{{ asset('assets/email-template/images/twitter.png') }}"></a>
                        <a href="#" style="padding: 0 5px;"><img src="{{ asset('assets/email-template/images/youtube.png') }}"></a>
                        <a href="#" style="padding: 0 5px;"><img src="{{ asset('assets/email-template/images/instagram.png') }}"></a>
                    </span>
                </td>
            </tr>
            <tr>
                <td style="width: 100%; padding: 0; height: 300px; background: url({{ asset('assets/email-template/images/email-banner.jpg') }}) no-repeat; background-size: cover; position: relative; z-index: 0; vertical-align: bottom;">
                    <div style="background: rgb(0 0 0 / 30%); width:100%; height:100%;  position:absolute; left:0; top:0; z-index: -1;"></div>
                    <p style="margin: 0;font-size:20px; padding: 30px; background:#46aaff; color: #fff;">
                        Best e-learning platform in Pakistan providing study tools including past papers solutions, book notes, and video lectures for matric and intermediate.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background:#fff ; padding: 30px;">
                    @yield('emailcontent')
                </td>
            </tr>
            <tr>
                <td style="padding:30px; background:#F6F6F6; font-size:16px;">
                    <table style="width: 100%; margin: 0 auto;">
                        <tr>
                            <td style="padding:10px 20px 10px 0; width: 60%; font-size:16px; vertical-align: top; border-right: 1px solid #d8d8d8;">
                                <h2 style="color:#656565; font-size:25px; font-weight: bold; margin:0 0 20px;">Address</h2>
                                <p style="color:#676767;">
                                    Second Floor, Beverly Center, Blue Area, Islamabad <br>
                                    <abbr title="Phone" style="font-weight: bold;">P:</abbr> +92 3 041-110-207  <br>
                                </p>

                            </td>
                            <td style="padding:10px 20px 10px 20px;width: 40%; font-size:16px;vertical-align: top;">
                                <h2 style="color:#656565; font-size:25px; font-weight: bold; margin:0 0 20px;">Web & Email</h2>
                                <p style="color:#676767;">
                                    <a href="#" style="color:#46aaff ; text-decoration: none;"><abbr title="Web" style="font-weight: bold;">W:</abbr> www.tutoria.pk</a><br>
                                    <a href="#" style="color:#46aaff ; text-decoration: none;"><abbr title="Email"style="font-weight: bold;">E:</abbr> info@tutoria.pk</a>
                                </p>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style=" background: #09216C; padding:10px;">
                    <p style=" font-size:14px; padding:20px; color:#fff; text-align:center;">powered & designed by E-Learning Services Pvt Ltd | all rights reserved © 2020</p>
                </td>
            </tr>
        </table>

</body>
</html>
