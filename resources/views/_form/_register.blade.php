{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}

{!! Form::open(array('url' => '/auth/register','class'=>'form')) !!}

{!! Form::label('name', 'Name') !!}
{!! Form::text('name', old('name'), array('class' => 'form-control')) !!}

{!! Form::label('email', 'E-Mail') !!}
{!! Form::text('email', old('email'), array('class' => 'form-control')) !!}
{!! Form::label('password', 'Password') !!}
{!! Form::password('password', array('class' => 'form-control')) !!}
{!! Form::label('password_confirmation', 'Re-type password') !!}
{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
<br />
<small>Allready have account? {!! link_to('/auth/login','Login') !!}</small>
<br />
{!! Form::submit('Register' , array('class' => 'btn btn-primary btn-block')) !!}
{!! Form::close() !!}