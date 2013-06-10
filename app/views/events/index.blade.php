@extends('layouts.main')
@section('title')活动- 岭南六少- 分享程序员的那些事儿@stop
@section('description')活动 - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords')活动 - 岭南六少- 分享程序员的那些事儿@stop

@section('content')
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
	{{ $events->links()  }}


@stop