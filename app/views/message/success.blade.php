@if ($messages)
<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  @foreach ($messages as $mes)
				{{ $mes }}
			@endforeach
</div>
@endif