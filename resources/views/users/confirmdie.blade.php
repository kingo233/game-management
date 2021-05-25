@extends('layouts.admin_default')
@section('page_name', '确认销毁账号')

@section('path')
<li class="breadcrumb-item">个人信息管理</li>
<li class="breadcrumb-item"><a href="{{ route('showdie',$user) }}">销毁账号</a></li>
@stop

@section('content')
<div class="row">
  <div class="offset-md-1 col-md-9 card card-danger">
    <div class="card-header">
      <h3 class="card-title">删除账号</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      @include('shared._errors')
      <form method="POST" action="{{ route('selfdie', $user )}}">
        @csrf
        <div class="form-group">
          <label for="password">密码：</label>
          <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="form-group">
          <label for="password_confirmation">确认密码：</label>
          <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
        </div>
        <label class="form-control">请注意！该操作不可逆！</label>
        <button type="submit" class="btn btn-danger">确认</button>
      </form>
    </div>
      <!-- /.card-body -->
  </div>
  
</div>
@stop