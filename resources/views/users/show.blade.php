@extends('layouts.admin_default')
@section('page_name', '编辑资料')

@section('path')
<li class="breadcrumb-item">个人信息管理</li>
<li class="breadcrumb-item"><a href="{{ route('users.show',$user) }}">编辑资料</a></li>
@stop

@section('content')
<div class="row">
  <div class="offset-md-2 col-md-8">
    <section class="user_info">
      @include('shared._user_info', ['user' => $user])
    </section>
  </div>
</div>
@stop