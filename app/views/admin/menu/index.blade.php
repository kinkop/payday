@section ('content')
	{{ View::make('message/success', array('messages' => $success_message)) }}
	{{ View::make('message/error', array('messages' => $errors_message)) }}
	{{ View::make('admin/partials/toolbar', array('add_url' => URL::to('admin/menu/add'))) }}
	<div class="row-fluid">
	<div class="span12">
	
	@if ($menus)
	<table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Menu Type</th>
                  <th>Target Type</th>
                  <th>Target Value</th>
                  <th>Sorting</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($menus as $menu)
               		<tr>
               			<td>{{ $menu->id }}</td>
               			<td>{{ $menu->name }}</td>
               			<td>{{ $menu->menu_name }}</td>
               			<td>{{ $menu->target_type }}</td>
               			<td>{{ $menu->target_value }}</td>
               			<td>{{ $menu->sorting }}</td>
               			<td>{{ $menu->created_at }}</td>
               			<td>{{ $menu->updated_at }}</td>
               			<td>
               				{{ 
               					View::make('admin/partials/list_toolbar',
               								array(
               									'edit_url' => URL::to('admin/menu/edit/' . $menu->id),
               									'delete_url' => URL::to('admin/menu/delete/' . $menu->id)
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