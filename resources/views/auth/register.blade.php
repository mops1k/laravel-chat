{{-- Variable set little trick --}}
{{-- */$title = 'Registration'/* --}}
@extends('app')

@section('body')
    <div class="col-md-6 col-md-offset-3">
    @include('_form._register')
    </div>
@stop