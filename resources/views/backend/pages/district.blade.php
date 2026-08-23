@extends('layouts.dashboard-sidenav')
@section('title','District Page')
@section('content')
    @include('backend.components.district.district-list')
    @include('backend.components.district.district-create')
    @include('backend.components.district.district-update')
    @include('backend.components.district.district-delete')
@endsection
