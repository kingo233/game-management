@extends('layouts.admin_default')
@section('page_name', '充值')

@section('charge','active')
@section('self_management','active')

@section('path')
<li class="breadcrumb-item">个人信息管理</li>
<li class="breadcrumb-item"><a href="{{ route('showcharge',$user) }}">充值</a></li>
@stop

@section('content')
<div class="row">
  <div class="offset-md-1 col-md-9 card card-primary">
    <div class="card-header">
      <h3 class="card-title">充值</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      @include('shared._errors')
      <form method="POST" action="{{ route('charge', $user->id) }}">
        @csrf

        <div class="form-group">
          <label for="money">金额：</label>
          <input type="text" name="money" class="form-control" value="0">
        </div>


        <button type="submit" class="btn btn-primary">充值</button>
      </form>
    </div>
      <!-- /.card-body -->
  </div>
  
</div>
@stop