@extends('layouts.main')
@section('title'){{ $group->name }} - 岭南六少- 分享程序员的那些事儿@stop
@section('description'){{ $group->name }} - 岭南六少- 分享程序员的那些事儿@stop
@section('keywords'){{ $group->name }}@stop

@section('content')
<div class="row">
<h5>群组</h5>
       <?php 
		if($group->logo)
		{
		?>
		<a href="<?php echo asset('data').'/'.$group->logo; ?>"  target="_blank"><img src="<?php echo asset('data').'/'.$group->logo; ?>"  style="width: 300px;height:200px;"/></a>
		<?php 
		}
		?>
		<h1>{{ $group->name }}</h1>
		<span>
		群主：{{ HTML::link('user/home/'.$group->author->id, $group->author->username) }}  
		    @if ( !Auth::guest() )
			    @if(Auth::user()->id == $group->author->id)
			        {{ HTML::link('group/edit/'.$group->id, '编辑') }}
			    @endif   
			@endif <br/>
		创建时间：{{ date('Y-m-d', strtotime($group->created_at)) }} <br/>
		访问次数：{{ $group->views }}次<br/>
		</span>  
		@if ( !Auth::guest() )
		<?php 

         if(!$group->ismember){
             echo HTML::link('group/jion/'.$group->id, '申请加入'); 
         }else{
         	 echo HTML::link('group/leave/'.$group->id, '退出群组'); 
         }
        ?>
		  
		@endif
		<p>
		群组简介：{{ $group->description }}
		</p>
		
</div>
<div class="row">
群组成员：
<?php 

foreach($group->users as $user)
{
?>
<?php echo HTML::link('user/home/'.$user->id, $user->username);?> 
<?php 
}
?>
</div>
@stop

