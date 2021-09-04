@extends('layouts.main')

@section('content')
<div class="callout primary">
	<div class="row column">
		<a href="/gallery/show/{{ $pic->gallery_id }}">Back to Gallery</a>
		<h1>{{ $pic->title }}</h1>
		<p class="lead">{{ $pic->description }}</p>
		<p>Location: {{ $pic->location }}</p>
	</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<div class="main">
		<img src="/images/{{ $pic->image }}" class="main-img">
	</div>
</div>
@stop