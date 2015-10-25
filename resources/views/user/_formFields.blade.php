{!! Form::label('username', 'Username:') !!}
{!! Form::text('username') !!}
<br />
{!! Form::label('email_address', 'Email:') !!}
{!! Form::text('email_address') !!}
<br />
{!! Form::label('password', 'Password:') !!}
{!! Form::password('password') !!}
<br />
{!! Form::label('selfie_name', 'Selfie:') !!}
{!! Form::file('selfie_name') !!}
<br />
{!! Form::submit($submitButtonText) !!}
