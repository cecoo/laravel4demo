<!DOCTYPE HTML>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
	<meta name="keywords" content="@yield('keywords')">
	<?php echo HTML::style('css/bootstrap.min.css') ;?> 
	<?php echo HTML::style('css/bootstrap-responsive.min.css') ;?> 
	<?php echo HTML::style('css/style.css') ;?> 
</head>
<body>
<div class="logo">

		<h2>岭南六少- 分享程序员的那些事儿</h2>
	
 </div>
	<div class="header">
		@if ( Auth::guest() )
		    {{ HTML::link('/', '首页') }} | {{ HTML::link('blog/all', '博客') }}  {{ HTML::link('photo/all', '图片') }}  {{ HTML::link('group/all', '群组') }}  {{ HTML::link('events/all', '活动') }} | {{ HTML::link('login', '登录') }} | {{ HTML::link('register', '注册') }}
		@else
			{{ HTML::link('/', '首页') }} | {{ HTML::link('blog/all', '博客') }}  {{ HTML::link('photo/all', '图片') }}  {{ HTML::link('group/all', '群组') }}  {{ HTML::link('events/all', '活动') }} | {{ HTML::link('user/home/'.Auth::user()->id, '个人空间') }} |
		@if ( Auth::guest() )
			游客
		@else
			 {{ HTML::link('user/setting/'.Auth::user()->id, '设置') }} | {{ HTML::link('photo/add', '发图片') }}  {{ HTML::link('blog/add', '发博客') }} {{ HTML::link('group/add', '创建群组') }} {{ HTML::link('events/add', '发起活动') }}  |
		@endif
		{{ HTML::link('logout', '退出') }}
		@endif
		<hr />
	</div>

	<div class="container">
		@yield('content')
	</div>
</body>
</html>