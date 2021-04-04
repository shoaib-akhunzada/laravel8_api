@extends('emails.layout')

@section('emailcontent')

    <h2 style="color:#656565; font-size:25px; margin:0 0 20px; font-weight: bold;">Hi {{ $user->name }},</h2>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        You recently requested to reset your password for your <a style="color:#46aaff;" href="https://tutoria.pk/">Tutoria</a> account. Click the button below to reset it.
    </p>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        <a style="color:#46aaff;" href="{{ $passwordResetLink }}">Reset your password</a>
    </p>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        <br />
        If you did not request a password reset, please ignore this email or reply to let us know. The password reset is only valid for next 15 minutes.
    </p>

    <p style="color:#676767; line-height: 21px; margin:0; font-size:16px;">
        <br />
        Thanks, <br />
        Team Tutoria
    </p>

@endsection
