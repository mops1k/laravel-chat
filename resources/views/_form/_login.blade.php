{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}

{!! Form::open(array('url' => '/auth/login','class'=>'form')) !!}
{!! Form::label('email', 'E-Mail') !!}
{!! Form::text('email', old('email'), array('class' => 'form-control')) !!}
{!! Form::label('password', 'Password') !!}
{!! Form::password('password', array('class' => 'form-control')) !!}
{!! Form::label('remember','Remember me') !!}
{!! Form::checkbox('remember',true,false) !!}
<br />
<small>Do not have account? {!! link_to('/auth/register','Register now!') !!}</small>
<br />
{!! Form::submit('Sign In' , array('class' => 'btn btn-primary btn-block')) !!}
{!! Form::close() !!}