@extends('layouts.admin_default')
@section('page_name', '编辑' . $user->name .'的资料')

@section('edit','active')
@section('self_management','active')

@section('path')
<li class="breadcrumb-item">个人信息管理</li>
<li class="breadcrumb-item"><a href="{{ route('users.show',$user) }}">编辑资料</a></li>
@stop

@section('content')
<div class="row">
  <div class="offset-md-1 col-md-4">
    <div class="small-box bg-green">
      <div class="inner">
        <h3 style="font-size:40px">{{ $user->credit }} 元</h3>

        <p>余额</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ route('showcharge',$user) }}" class="small-box-footer">
        前去充值<i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="offset-md-1 col-md-4">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3 style="font-size:40px">
          @if ($user->is_banned)
            冻结
          @else
            正常
          @endif
        </h3>

        <p>账号状态</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">
        前去申诉<i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="offset-md-1 col-md-9 card card-primary">
    <div class="card-header">
      <h3 class="card-title">更改资料</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      @include('shared._errors')
      <form method="POST" action="{{ route('users.update', $user->id )}}">
        {{ method_field('PATCH') }}
        @csrf

        <div class="gravatar_edit">
            <a href="http://gravatar.com/emails" target="_blank">
              <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar"/>
            </a>
        </div>
        <div class="form-group">
          <label for="name">名称：</label>
          <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
          <label for="email">邮箱：</label>
          <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group">
          <label for="password">密码：</label>
          <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="form-group">
          <label for="password_confirmation">确认密码：</label>
          <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
      </form>
    </div>
      <!-- /.card-body -->
  </div>
  
</div>
@stop