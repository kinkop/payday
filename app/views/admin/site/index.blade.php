@section ('content')
	{{ View::make('message/success', array('messages' => $success_message)) }}
	{{ View::make('message/error', array('messages' => $errors_message)) }}
	<?php /*{{ View::make('admin/partials/toolbar', array('add_url' => URL::to('admin/site/add'))) }}*/ ?>
	<div class="row-fluid">
	<div class="span12">
	
	@if ($sites)
	<table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>URL</th>
                  <th>Created</th>
                  <th>Updated</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($sites as $site)
               		<tr>
               			<td>{{ $site->id }}</td>
               			<td>{{ $site->name }}</td>
               			<td><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></td>
               			<td>{{ $site->created_at }}</td>
               			<td>{{ $site->updated_at }}</td>
               		</tr>
               @endforeach
              </tbody>
            </table>
     @endif
  
     </div>
     </div>

@stop