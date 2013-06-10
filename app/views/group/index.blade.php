@extends('layouts.main')
@section('title')群组 - 岭南六少- 分享程序员的那些事儿@stop
@section('description')群组 - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords')群组 - 岭南六少- 分享程序员的那些事儿@stop

@section('content')
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
	{{ $groups->links()  }}


@stop