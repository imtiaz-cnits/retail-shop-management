@extends('layouts.dashboard-sidenav')
@section('title','Upazila Page')
@section('content')
    @include('backend.components.upazila.upazila-list')
    @include('backend.components.upazila.upazila-create')
    @include('backend.components.upazila.upazila-update')
    @include('backend.components.upazila.upazila-delete')
@endsection
