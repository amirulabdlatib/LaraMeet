@extends('components.layouts.index')

@section('title', 'Register | LaraMeet')

@section('content')
    @include('components.forms.register-content')
@endsection


@section('form')
    @include('components.forms.register-form')
@endsection
