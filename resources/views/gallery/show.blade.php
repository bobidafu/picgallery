@extends('layouts.main')

@section('content')
<div class="callout primary">
	<div class="row column">
		<a href="/">Back to Galleries</a>
		<h1>{{ $gallery->name }}</h1>
		<p class="lead">{{ $gallery->description }}</p>
		<?php if(Auth::check()) :?>
			<a href="/pic/create/{{ $gallery->id }}" class="button">Upload Photo</a>
		<?php endif; ?>
	</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<?php foreach($pics as $pic) : ?>
		<div class="column">
			<a href="/pic/details/{{ $pic->id }}">
				<img class="thumbnail" src="/images/{{ $pic->image }}">
			</a>
			<h5>{{ $pic->title }}</h5>
			<p>{{ $pic->description }}</p>
		</div>
	<?php endforeach; ?>
</div>
@stop