@extends('layouts.main')

@section('content')
 <div class="row">
  <h5>编辑 活动</h5>
	{{ Form::open(array('url'=>'events/edit/'.$events->id,'files'=>true)) }}

		<!-- author -->
		{{ Form::hidden('author_id', $events->author->id) }}
	   <?php if($events->logo){?>
       <img src="<?php echo asset('data').'/'.$events->logo; ?>" style="width: 300px;height:200px;"/>
       <?php }?>
       <p>{{ Form::label('file', '附件上传') }}</p>
        <p>
        {{ Form::file('file') }}
        </p>
		<!-- title field -->
		<p>{{ Form::label('name', '活动名称') }}</p>
		{{ $errors->first('name', '<p class="error">:message</p>') }}
		<p>{{ Form::text('name', $events->name) }}</p>
	    <!-- description field -->
		<p>{{ Form::label('description', '描述') }}</p>
		{{ $errors->first('description', '<p class="error">:message</p>') }}
		<p>{{ Form::textarea('description', $events->description) }}</p>
		<!-- body field -->
		
        <!-- tags field -->
		<p>{{ Form::label('tags', '标签') }}</p>
		{{ $errors->first('tags', '<p class="error">:message</p>') }}
		<p>{{ Form::text('tags', $events->tags) }}</p>
		<!-- submit button -->
		<p>{{ Form::submit('保存') }}</p>

	{{ Form::close() }}
</div>
@endsection