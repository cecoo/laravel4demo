@extends('layouts.main')
@section('title')岭南六少- 分享程序员的那些事儿@stop
@section('description')岭南六少- 分享程序员的那些事儿@stop
@section('keywords')岭南六少- 分享程序员的那些事儿@stop

@section('content')
<div class="row">
<h5>图片</h5>
	   <ul class=thumbnails>
	@foreach ($photos as $photo)
	<li class="span3">
	        <div class="thumbnail">
			<a   href="<?php echo url('photo/view/'.$photo->id);?>" title="<?php echo $photo->title;?>">
		    <img src="<?php echo asset('data').'/'.$photo->pictrue; ?>" style="width: 260px; height: 180px;" >
		    </a>
		  
		   <div class="caption">
			<h6><a  href="<?php echo url('photo/view/'.$photo->id);?>" title="<?php echo $photo->title;?>"><?php echo $photo->title;?></a></h6>
			  <p>
			<span>作者：<a  href="<?php echo url('user/home/'.$photo->author->id);?>" >{{ $photo->author->username }} </a>
			<br/>
			发表时间: <?php echo date('Y-m-d', strtotime($photo->created_at));?> </span>
			 </p>
			 </div>
			 </div>
	</li>
    @endforeach
    </ul>
</div>
 
<div class="row">
<h5>群组</h5>
	   <ul class=thumbnails>
	@foreach ($groups as $group)
	<li class="span3">
	        <div class="thumbnail">
			<a   href="<?php echo url('group/view/'.$group->id);?>" title="<?php echo $group->name;?>">
		    <img src="<?php echo asset('data').'/'.$group->logo; ?>" style="width: 260px; height: 180px;" >
		    </a>
		  
		   <div class="caption">
			<h6><a  href="<?php echo url('group/view/'.$group->id);?>" title="<?php echo $group->name;?>"><?php echo $group->name;?></a></h6>
			  <p>
			<span>群主：<a  href="<?php echo url('user/home/'.$group->author->id);?>" >{{ $group->author->username }} </a>
			<br/>
			创建时间: <?php echo date('Y-m-d', strtotime($group->created_at));?> </span>
			 </p>
			 </div>
			 </div>
	</li>
    @endforeach
    </ul>
</div>
<div class="row">
<h5>活动</h5>
	   <ul class=thumbnails>
	@foreach ($events as $event)
	<li class="span3">
	        <div class="thumbnail">
			<a   href="<?php echo url('events/view/'.$event->id);?>" title="<?php echo $event->name;?>">
		    <img src="<?php echo asset('data').'/'.$event->logo; ?>" style="width: 260px; height: 180px;" >
		    </a>
		  
		   <div class="caption">
			<h6><a  href="<?php echo url('events/view/'.$event->id);?>" title="<?php echo $event->name;?>"><?php echo $event->name;?></a></h6>
			  <p>
			<span>发起人：<a  href="<?php echo url('user/home/'.$event->author->id);?>" >{{ $event->author->username }} </a>
			<br/>
			创建时间: <?php echo date('Y-m-d', strtotime($event->created_at));?> </span>
			 </p>
			 </div>
			 </div>
	</li>
    @endforeach
    </ul>
</div>
<div class="row">
 <h5>最新博客</h5>
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
</div>
@stop