@extends('layouts.dashboard-sidenav')
@section('title','Investor Info List Page')
@section('content')
    @include('backend.components.investment.invest-list.invest-list')
    @include('backend.components.investment.invest-list.invest-create')
    @include('backend.components.investment.invest-list.invest-update')
    @include('backend.components.investment.invest-list.invest-delete')
@endsection
