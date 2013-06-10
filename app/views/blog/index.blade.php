@extends('layouts.main')
@section('title')博客首页 - 岭南六少- 分享程序员的那些事儿@stop
@section('description'博客首页 - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords')博客首页 - 岭南六少- 分享程序员的那些事儿@stop

@section('content')
 <div class="row">
 <h5>文章</h5>
	@foreach ($blogs as $blog)
	    
		<div class="bloglist">
			<h1>{{ HTML::link('blog/view/'.$blog->id, $blog->title) }}</h1>
			<p>{{ $blog->description.' [..]' }}</p>
			<p>
			{{ $blog->author->username }} {{ date('Y-m-d', strtotime($blog->created_at)) }} 
			</p>
			<p>{{ HTML::link('blog/view/'.$blog->id, '阅读更多 &rarr;') }}</p>
		</div>
		
    @endforeach
	{{ $blogs->links()  }}
</div>

@stop