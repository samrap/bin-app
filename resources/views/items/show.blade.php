@extends('layouts.app')

@section('title', $item->name)

@section('content')

<h1>{{ $item->name }}</h1>

@endsection
