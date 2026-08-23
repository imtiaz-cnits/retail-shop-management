@extends('layouts.dashboard-sidenav')
@section('title','Investor Info Page')
@section('content')
    @include('backend.components.investment.investor-info.investor-info-list')
    @include('backend.components.investment.investor-info.investor-info-create')
    @include('backend.components.investment.investor-info.investor-info-update')
    @include('backend.components.investment.investor-info.investor-info-delete')
@endsection
