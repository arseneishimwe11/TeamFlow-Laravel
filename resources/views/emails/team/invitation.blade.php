@component('mail::message')
# You're Invited to Join TeamFlow

You've been invited to join the team as a {{ $inviteData['role'] }}.

@component('mail::button', ['url' => $inviteData['acceptUrl']])
Accept Invitation
@endcomponent

This invitation will expire in 48 hours.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
