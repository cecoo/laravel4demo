@extends('layouts.main')
@section('title'){{ $blog->title }} - 岭南六少- 分享程序员的那些事儿@endsection
@section('description'){{ $blog->title }} - 岭南六少- 分享程序员的那些事儿@endsection
@section('keywords'){{ $blog->title }}@endsection

@section('content')
<div class="row">
<h5>文章</h5>
		<h1>{{ $blog->title }}</h1>
		<span>
		作者：{{ HTML::link('user/home/'.$blog->author->id, $blog->author->username) }} 发表时间：{{ date('Y-m-d', strtotime($blog->created_at)) }} 阅读次数：{{ $blog->views }}次
			@if ( !Auth::guest() )
			    @if(Auth::user()->id == $blog->author->id)
			        {{ HTML::link('blog/edit/'.$blog->id, '编辑') }}
			    @endif   
			@endif 
		</span>
		<p>
		<?php 
		if($blog->pictrue)
		{
		?>
		<img src="<?php echo asset('data').'/'.$blog->pictrue; ?>" />
		<?php 
		}
		?>
		</p>
		<p>
		{{ $blog->content }}
		</p>
		<p>{{ HTML::link('blog/all', '返回博客首页') }}</p>
</div>
@endsection

