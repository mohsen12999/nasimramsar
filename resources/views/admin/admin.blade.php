@extends('layouts.admin')

@section('content')
<!-- Your Page Content Here -->
    <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
    <a href="{{url('admin\new')}}">
        <div class="info-box">
        <span class="info-box-icon bg-green">
            <i class="fa fa-files-o"></i>
        </span>

        <div class="info-box-content">
            <span class="info-box-text">بخش</span>
            <span class="info-box-number"> خبر ها</span>
        </div>
        <!-- /.info-box-content -->
        </div>
    </a>
    <!-- /.info-box -->
    </div>

    <!-- Your Page Content Here -->
    <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
    <a href="{{url('admin\course')}}">
        <div class="info-box">
        <span class="info-box-icon bg-blue">
            <i class="fa fa-calendar"></i>
        </span>

        <div class="info-box-content">
            <span class="info-box-text">بخش</span>
            <span class="info-box-number"> دوره ها </span>
        </div>
        <!-- /.info-box-content -->
        </div>
    </a>
    <!-- /.info-box -->
    </div>
    <!-- Your Page Content Here -->
    <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
    <a href="{{url('admin\teacher')}}">
        <div class="info-box">
        <span class="info-box-icon bg-yellow">
            <i class="fa fa-users"></i>
        </span>

        <div class="info-box-content">
            <span class="info-box-text">بخش</span>
            <span class="info-box-number"> اساتید</span>
        </div>
        <!-- /.info-box-content -->
        </div>
    </a>
    <!-- /.info-box -->
    </div>
    <!-- Your Page Content Here -->
    <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
    <a href="{{url('admin\gallery')}}">
        <div class="info-box">
        <span class="info-box-icon bg-aqua-gradient">
            <i class="fa fa-picture-o"></i>
        </span>

        <div class="info-box-content">
            <span class="info-box-text">بخش</span>
            <span class="info-box-number"> گالری</span>
        </div>
        <!-- /.info-box-content -->
        </div>
    </a>
    <!-- /.info-box -->
    </div>
    <!-- Your Page Content Here -->
    <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
    <a href="{{url('admin\message')}}">
        <div class="info-box">
        <span class="info-box-icon bg-teal">
            <i class="fa fa-envelope"></i>
        </span>

        <div class="info-box-content">
            <span class="info-box-text">بخش</span>
            <span class="info-box-number">پیام ها</span>
        </div>
        <!-- /.info-box-content -->
        </div>
    </a>
    <!-- /.info-box -->
    </div>
    @endsection