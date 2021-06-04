@extends('layouts.admin_default')
@section('page_name', '账号申诉')

@section('show_complain','active')
@section('self_management','active')

@section('path')
<li class="breadcrumb-item">个人信息管理</li>
<li class="breadcrumb-item"><a href="#">账号申诉</a></li>
@stop

@section('content')
  <div class="offset-md-1 col-md-9 card card-primary">
    <div class="card-header">
      <h3 class="card-title">账号申诉</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      @include('shared._errors')
      <form method="POST" action="{{ route('users.complain', $user->id )}}">
        @csrf
        <div class="form-group">
          <label for="id">封禁编号：</label>
          <input type="text" name="id" class="form-control" value="{{ $ban_record->id }}" disabled>
        </div>

        <div class="form-group">
          <label for="name">用户名称：</label>
          <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
        </div>

        <div class="form-group">
          <label for="reason">封禁理由：</label>  
          <textarea name="reason" class="form-control" disabled>
{{ $ban_record->reason }}
          </textarea>
        </div>

        <div class="form-group">
          <label for="reason">申诉理由：</label>  
          <textarea name="complaint" class="form-control"></textarea>
        </div>

        @if($ban_record->result != "")
        <div class="form-group">
          <label for="result">申诉理由：</label>  
          <textarea name="result" class="form-control" disabled>{{ $ban_record->result }}</textarea>
        </div>
        @endif
        <button type="submit" class="btn btn-primary">提交申诉</button>
      </form>
    </div>
      <!-- /.card-body -->
  </div>

@stop