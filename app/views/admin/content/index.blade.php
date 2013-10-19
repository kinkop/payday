@section ('content')
	{{ View::make('message/success', array('messages' => $success_message)) }}
	{{ View::make('message/error', array('messages' => $errors_message)) }}
	{{ View::make('admin/partials/toolbar', array('add_url' => URL::to('admin/content/add'))) }}
	<div class="row-fluid">
	<div class="span12">
	
	@if ($contents)
	<table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($contents as $content)
               		<tr>
               			<td>{{ $content->id }}</td>
               			<td>{{ $content->title }}</td>
               			<td>{{ $content->created_at }}</td>
               			<td>{{ $content->updated_at }}</td>
               			<td>
               				{{ 
               					View::make('admin/partials/list_toolbar',
               								array(
               									'edit_url' => URL::to('admin/content/edit/' . $content->id),
               									'delete_url' => URL::to('admin/content/delete/' . $content->id)
               								)) 
               				}}
               			</td>
               		</tr>
               @endforeach
              </tbody>
            </table>
     @endif
     </div>
     </div>

@stop