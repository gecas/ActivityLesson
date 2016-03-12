@foreach($activity as $event)
		<div class="container">@include("activity.types.{$event->name}")</div>
@endforeach