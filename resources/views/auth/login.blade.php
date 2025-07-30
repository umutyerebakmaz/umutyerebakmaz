@extends('layouts.guest')

@section('content')
    <x-alerts.attention :attention="'attention'"></x-alerts.attention>
    <x-auth.login-form></x-auth.login-form>
@endsection
