@extends('pages.app')
@section('title', 'Profile')
@section('content')
<h2>My Profile</h2>
<p>Name: {{ auth()->user()->name }}</p>
<p>Email: {{ auth()->user()->email }}</p>
@endsection