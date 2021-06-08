@extends('layouts.admin_default')
@section('page_name', '创建管理员')

@section('create_admin','active')
@section('admin_management','active')

@section('path')
<li class="breadcrumb-item">管理员管理</li>
<li class="breadcrumb-item"><a href="#">创建管理员</a></li>
@stop

@section('content')

<div class="row">
  <div class="offset-md-1 col-md-9 card card-primary">
    <div class="card-header">
      <h3 class="card-title">创建管理</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      @include('shared._errors')
      <form method="POST" action="{{ route('admins.store') }}">
        @csrf


        <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="priority" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">普通管理员</label>
            </div>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="priority" id="inlineRadio2" value="2">
              <label class="form-check-label" for="inlineRadio2">策划</label>
          </div>
        </div>

        <p>若邮箱对应的用户不存在将自动创建用户并提权，若存在则提权。</p>
        <button type="submit" class="btn btn-primary">创建</button>
      </form>
    </div>
      <!-- /.card-body -->
  </div>
  
</div>

@stop