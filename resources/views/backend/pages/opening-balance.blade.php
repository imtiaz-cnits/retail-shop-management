@extends('layouts.dashboard-sidenav')
@section('title','Opening Balance Page')
@section('content')
    @include('backend.components.opening-balance.opening-balance-list')
    @include('backend.components.opening-balance.opening-balance-create')
@endsection