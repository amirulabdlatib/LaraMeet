@extends('components.layouts.base')

@section('title')
    {{ $user->name }} Profile | LaraMeet
@endsection

@section('content')
    @include('components.profile')
@endsection
