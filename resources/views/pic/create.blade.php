@extends('layouts.main')

@section('content')
<div class="callout primary">
	<div class="row column">
		<h1>Upload Pic</h1>
		<p class="lead">Upload a pic to the gallery</p>
	</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<div class="main">
		{!! Form::open(array('action' => 'PicController@store', 'enctype' => 'multipart/form-data')) !!}
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', $value = null, $attributes = ['placeholder' => 'Pic Title', 'name' => 'title']) !!}

			{!! Form::label('description', 'Description') !!}
			{!! Form::text('description', $value = null, $attributes = ['placeholder' => 'Pic Description', 'name' => 'description']) !!}

			{!! Form::label('description', 'Location') !!}
			{!! Form::text('location', $value = null, $attributes = ['placeholder' => 'Pic Location', 'name' => 'location']) !!}

			{!! Form::label('image', 'Pic') !!}
			{!! Form::file('image') !!}

			<!-- We need to send it to the store method when we submit the form in this hidden field -->
			<input type="hidden" name='gallery_id' value="{{ $gallery_id }}" >

			{!! Form::submit('Submit', $attributes = ['class' => 'button']) !!}
		{!! Form::close() !!}
	</div>
</div>
@stop