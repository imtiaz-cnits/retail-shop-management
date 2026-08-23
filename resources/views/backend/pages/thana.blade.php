@extends('layouts.dashboard-sidenav')
@section('title','Thana Page')
@section('content')
    @include('backend.components.thana.thana-list')
    @include('backend.components.thana.thana-create')
    @include('backend.components.thana.thana-update')
    @include('backend.components.thana.thana-delete')
@endsection
