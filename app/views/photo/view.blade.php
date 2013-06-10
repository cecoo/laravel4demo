@extends('layouts.main')
@section('title'){{ $photo->title }} - 岭南六少- 分享程序员的那些事儿@endsection
@section('description'){{ $photo->title }} - 岭南六少- 分享程序员的那些事儿@endsection
@section('keywords'){{ $photo->title }}@endsection

@section('content')
<div class="row-fluid">
<h5>图片</h5>
		<h1>{{ $photo->title }}</h1>
		<span>
		作者：{{ HTML::link('user/home/'.$photo->author->id, $photo->author->username) }} 发表时间：{{ date('Y-m-d', strtotime($photo->created_at)) }} 阅读次数：{{ $photo->views }}次
			@if ( !Auth::guest() )
			    @if(Auth::user()->id == $photo->author->id)
			        {{ HTML::link('photo/edit/'.$photo->id, '编辑') }}
			    @endif   
			@endif 
		</span>
		<p>
		<?php 
		if($photo->pictrue)
		{
		?>
		<a href="<?php echo asset('data').'/'.$photo->pictrue; ?>"  target="_blank"><img src="<?php echo asset('data').'/'.$photo->pictrue; ?>"  style="width: 500px;height:300px;"/></a>
		<?php 
		}
		?>
		</p>
		<p>
		{{ $photo->description }}
		</p>
		<p>{{ HTML::link('photo/all', '返回图片首页') }}</p>
</div>
@stop

