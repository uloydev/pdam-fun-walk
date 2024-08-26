{{-- email body for registration confirmation --}}
<div>
    <p>Dear {{ $participant->name }},</p>
    <p>Thank you for registering for the Tirta Asasta Fun Walk event. Please click the link below to verify your email address and complete your registration.</p>
    <p><a href="{{$participant->getVerificationLink()}}">Verify Email</a></p>
    <p>If you did not register for this event, please ignore this email.</p>
    <p>Thank you!</p>
</div>