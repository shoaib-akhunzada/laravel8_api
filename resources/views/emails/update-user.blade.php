@extends('emails.layout')

@section('emailcontent')

    <h2 style="color:#656565; font-size:25px; margin:0 0 20px; font-weight: bold;">Hi {{ $user->name }},</h2>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        Your profile details have been updated. For more information contact your administrator.
    </p>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        Profile Details
    </p>

    <table style="width: 100%; margin:30px auto 10px;">
        <tr>
            <td style="padding:10px; background:#f72585; color:#fff; width: 30%; font-size:16px;">Name</td>
            <td style="padding:10px; background:#F6F6F6; font-size:16px; color:#676767; ">{{ $user->name }}</td>
        </tr>
        <tr>
            <td style="padding:10px; background:#f72585; color:#fff; width: 30%; font-size:16px;">Email</td>
            <td style="padding:10px; background:#F6F6F6; font-size:16px;">{{ $user->email }}</td>
        </tr>
        <tr>
            <td style="padding:10px; background:#f72585; color:#fff; width: 30%; font-size:16px;">Role</td>
            <td style="padding:10px; background:#F6F6F6; font-size:16px; color:#676767; ">{{ $user->roles[0]->name }}</td>
        </tr>
    </table>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        Please click on login below.<br />
        <a style="color:#46aaff;" href="{{ $loginLink }}">Login</a>
    </p>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        <br />
        Thanks, <br />
        Team Tutoria
    </p>

@endsection
