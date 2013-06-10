@extends('layouts.main')

@section('content')
 <div class="row">
 <h5>创建群主</h5>
	{{ Form::open(array('url'=>'group/add', 'files'=>true)) }}

		<!-- author -->
		{{ Form::hidden('author_id', $user->id) }}
		<!-- body field -->
       <p>{{ Form::label('file', '附件上传') }}</p>
        <p>
        {{ Form::file('file') }}
        </p>
	<!-- title field -->
		<p>{{ Form::label('name', '群主名称') }}</p>
		{{ $errors->first('name', '<p class="error">:message</p>') }}
		<p>{{ Form::text('name', Input::old('name'))}}</p>
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