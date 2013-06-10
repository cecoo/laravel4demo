@extends('layouts.main')
@section('title'){{ $events->name }} - 岭南六少- 分享程序员的那些事儿@stop
@section('description'){{ $events->name }} - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords'){{ $events->name }}@stop

@section('content')
<div class="row">
<h5>活动</h5>
       <?php 
		if($events->logo)
		{
		?>
		<a href="<?php echo asset('data').'/'.$events->logo; ?>"  target="_blank"><img src="<?php echo asset('data').'/'.$events->logo; ?>"  style="width: 300px;height:200px;"/></a>
		<?php 
		}
		?>
		<h1>{{ $events->name }}</h1>
		<span>
		发起人：{{ HTML::link('user/home/'.$events->author->id, $events->author->username) }}  
		    @if ( !Auth::guest() )
			    @if(Auth::user()->id == $events->author->id)
			        {{ HTML::link('events/edit/'.$events->id, '编辑') }}
			    @endif   
			@endif <br/>
		创建时间：{{ date('Y-m-d', strtotime($event->created_at)) }} <br/>
		访问次数：{{ $events->views }}次<br/>
		</span>  
		@if ( !Auth::guest() )
		<?php 

         if(!$events->ismember){
             echo HTML::link('events/jion/'.$events->id, '参加活动'); 
         }else{
         	 echo HTML::link('events/leave/'.$events->id, '退出活动'); 
         }
        ?>
		  
		@endif
		<p>
		活动简介：{{ $events->description }}
		</p>
		
</div>
<div class="row">
参与成员：
<?php 

foreach($events->users as $user)
{
?>
<?php echo HTML::link('user/home/'.$user->id, $user->username);?> 
<?php 
}
?>
</div>
@stop

