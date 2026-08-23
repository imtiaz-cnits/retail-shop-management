@extends('layouts.dashboard-sidenav')
@section('title','Location Page')
@section('content')
    @include('backend.components.location.location-list')
    @include('backend.components.location.location-create')
    @include('backend.components.location.location-update')
    @include('backend.components.location.location-delete')
@endsection
