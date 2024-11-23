@extends('components.layouts.base')

@section('title','Home | LaraMeet')

@section('content')
    @include('components.content')
@endsection


@section('form')
    @include('components.forms.login-form')
@endsection