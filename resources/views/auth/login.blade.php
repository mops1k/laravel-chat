{{-- Variable set little trick --}}
{{-- */$title = 'Login'/* --}}
@extends('app')

@section('body')
    <div class="col-md-6 col-md-offset-3">
    @include('_form._login')
    </div>
@stop