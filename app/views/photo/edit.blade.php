@extends('layouts.main')

@section('content')
 <div class="row">
  <h5>编辑图片</h5>
	{{ Form::open(array('url'=>'photo/edit/'.$photo->id,'files'=>true)) }}

		<!-- author -->
		{{ Form::hidden('author_id', $photo->author->id) }}
	   <?php if($photo->pictrue){?>
       <img src="<?php echo asset('data').'/'.$photo->pictrue; ?>" style="width: 300px;height:200px;"/>
       <?php }?>
       <p>{{ Form::label('file', '附件上传') }}</p>
        <p>
        {{ Form::file('file') }}
        </p>
		<!-- title field -->
		<p>{{ Form::label('title', '标题') }}</p>
		{{ $errors->first('title', '<p class="error">:message</p>') }}
		<p>{{ Form::text('title', $photo->title) }}</p>
	    <!-- description field -->
		<p>{{ Form::label('description', '描述') }}</p>
		{{ $errors->first('description', '<p class="error">:message</p>') }}
		<p>{{ Form::textarea('description', $photo->description) }}</p>
		<!-- body field -->
		
        <!-- tags field -->
		<p>{{ Form::label('tags', '标签') }}</p>
		{{ $errors->first('tags', '<p class="error">:message</p>') }}
		<p>{{ Form::text('tags', $photo->tags) }}</p>
		<!-- submit button -->
		<p>{{ Form::submit('发表') }}</p>

	{{ Form::close() }}
</div>
@endsection