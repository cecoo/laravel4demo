@extends('layouts.main')
@section('title')登录页面 - 岭南六少- 分享程序员的那些事儿@endsection
@section('description')登录页面 - 岭南六少- 分享程序员的那些事儿@endsection
@section('keywords')登录页面 - 岭南六少- 分享程序员的那些事儿@endsection

@section('content')
 <div class="row">
	{{ Form::open(array('url'=>'login','method'=>'post')) }}

		<!-- check for login errors flash var -->
		@if (Session::has('login_errors'))
			<span class="error">用户名密码错误！</span>
		@endif

		<!-- username field -->
		<p>{{ Form::label('email', '邮箱') }}</p>
		<p>{{ Form::text('email', Input::old('email')) }}</p>

		<!-- password field -->
		<p>{{ Form::label('password', '密码') }}</p>
		<p>{{ Form::password('password') }}</p>

		<!-- submit button -->
		<p>{{ Form::submit('登录') }}</p>

	{{ Form::close() }}
</div>
@stop