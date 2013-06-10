@extends('layouts.main')

@section('content')
<div class="row">
 <h5>编辑文章</h5>
	{{ Form::open(array('url'=>'blog/edit/'.$blog->id,'files'=>true)) }}

		<!-- author -->
		{{ Form::hidden('author_id', $blog->author->id) }}

		<!-- title field -->
		<p>{{ Form::label('title', '标题') }}</p>
		{{ $errors->first('title', '<p class="error">:message</p>') }}
		<p>{{ Form::text('title', $blog->title) }}</p>
	    <!-- description field -->
		<p>{{ Form::label('description', '描述') }}</p>
		{{ $errors->first('description', '<p class="error">:message</p>') }}
		<p>{{ Form::textarea('description', $blog->description) }}</p>
		<!-- body field -->
		<p>{{ Form::label('content', '正文') }}</p>
		{{ $errors->first('content', '<p class="error">:message</p>') }}
		<p>{{ Form::textarea('content', $blog->content) }}</p>
		<img src="<?php echo asset('data').'/'.$blog->pictrue; ?>" />
       <p>{{ Form::label('file', '附件上传') }}</p>
        <p>
        {{ Form::file('file') }}
        </p>
        <!-- tags field -->
		<p>{{ Form::label('tags', '标签') }}</p>
		{{ $errors->first('tags', '<p class="error">:message</p>') }}
		<p>{{ Form::text('tags', $blog->tags) }}</p>
		<!-- submit button -->
		<p>{{ Form::submit('发表') }}</p>

	{{ Form::close() }}
</div>
@endsection