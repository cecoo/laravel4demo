@extends('layouts.main')
@section('title')编辑用户资料 - 岭南六少- 分享程序员的那些事儿@stop
@section('description')编辑用户资料 - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords')编辑用户资料- 岭南六少- 分享程序员的那些事儿@stop

@section('content')
 <div class="row">
	{{ Form::open(array('url'=>'user/setting/'.$user->id,'method'=>'post')) }}

		<!-- check for login errors flash var -->
		@if (Session::has('setting_errors'))
			<span class="error">编辑个人资料失败！</span>
		@endif

		<!-- username field -->
		<p>{{ Form::label('username', '昵称') }}</p>
		{{ $errors->first('username', '<p class="error">:message</p>') }}
		<p>{{ Form::text('username', $user->username) }}</p>
        <!-- email field -->
        
		<!-- submit button -->
		<p>{{ Form::submit('保存') }}</p>

	{{ Form::close() }}
</div>
@stop