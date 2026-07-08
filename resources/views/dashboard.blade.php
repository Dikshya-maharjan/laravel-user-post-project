@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<h1>Dashboard</h1>
<p></p>
<p>Welcome {{ Auth::user()->name }}</p>

@endsection