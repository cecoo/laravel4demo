@extends('layouts.main')
@section('title')图片 - 岭南六少- 分享程序员的那些事儿@stop
@section('description')图片 - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords')图片 - 岭南六少- 分享程序员的那些事儿@stop

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
	{{ $photos->links()  }}


@stop