@extends('layouts.main')

@section('content')
 <div class="row">
 <h5>发图片</h5>
	{{ Form::open(array('url'=>'photo/add', 'files'=>true)) }}

		<!-- author -->
		{{ Form::hidden('author_id', $user->id) }}
		<!-- body field -->
       <p>{{ Form::label('file', '附件上传') }}</p>
        <p>
        {{ Form::file('file') }}
        </p>
	<!-- title field -->
		<p>{{ Form::label('title', '标题') }}</p>
		{{ $errors->first('title', '<p class="error">:message</p>') }}
		<p>{{ Form::text('title', Input::old('title'))}}</p>
	    <!-- description field -->
		<p>{{ Form::label('description', '描述') }}</p>
		{{ $errors->first('description', '<p class="error">:message</p>') }}
		<p>{{ Form::textarea('description', Input::old('description')) }}</p>
		
        <!-- tags field -->
		<p>{{ Form::label('tags', '标签') }}</p>
		{{ $errors->first('tags', '<p class="error">:message</p>') }}
		<p>{{ Form::text('tags', Input::old('tags')) }}</p>
		<!-- submit button -->
		<p>{{ Form::submit('发表') }}</p>

	{{ Form::close() }}
</div>
@stop