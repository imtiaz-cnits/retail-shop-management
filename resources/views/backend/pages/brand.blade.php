@extends('layouts.dashboard-sidenav')
@section('title','Brand Page')
@section('content')
    @include('backend.components.brand.brand-list')
    @include('backend.components.brand.brand-create')
    @include('backend.components.brand.brand-update')
    @include('backend.components.brand.brand-delete')
@endsection
