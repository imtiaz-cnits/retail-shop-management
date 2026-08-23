@extends('layouts.dashboard-sidenav')
@section('title','Return List Page')
@section('content')
    @include('backend.components.return.return-list')
    @include('backend.components.return.return-create')
    @include('backend.components.return.return-update')
    @include('backend.components.return.return-delete')
@endsection
