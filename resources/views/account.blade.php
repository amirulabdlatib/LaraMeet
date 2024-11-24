@extends('components.layouts.index')

@section('title', 'Account Settings | LaraMeet')

@section('content')
    @include('components.forms.account-form-content')
@endsection


@section('form')
    @include('components.forms.account-form')
@endsection
