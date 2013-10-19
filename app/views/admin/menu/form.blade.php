@section ('content')
<form method="post" enctype="multipart/form-data" action="{{ $form_action }}">
  <fieldset>
    <legend>{{ $action_title }} {{ View::make('admin/partials/form_toolbar', array('cancel_url' => URL::to('admin/menu'))) }}</legend>
    <label for="name">Menu Name</label>
    <input type="text" placeholder="Title" name="name" id="name" class="input-large" style="width: 400px;" value="{{ $name }}">
    <label>Description</label>
    <textarea name="description" id="description">{{ $description }}</textarea>
    <label>Menu Type</label>
    <select name="menu_type_id">
    	@if ($menu_types)
    		@foreach ($menu_types as $type)
    			<option value="{{ $type->id }}" <?php echo ($menu_type_id == $type->id) ? 'selected="selected"' : ''; ?>>{{ $type->name }}</option>
    		@endforeach
    	@endif
    </select>
    <label>Target Type</label>
    <select id="target_type" name="target_type">
    	<option value="">- Select -</option>
    	@if ($target_types)
    		@foreach ($target_types as $key => $val)
    			<option value="{{ $key }}" <?php echo ($target_type == $key) ? 'selected="selected"' : ''; ?>>{{ $val['name'] }}</option>
    		@endforeach
    	@endif
    </select>
    <p class="target_value" id="target_controller" <?php echo ($target_type == 'controller') ? '' : 'style="display: none;"' ?>>
	    <label>Target Value</label>
	    <select id="target_value" name="target_value_controller">
	    	@foreach ($target_types['controller']['extendDatas'] as $key => $val)
	    		<option value="{{ $key }}"  <?php echo ($target_value == $key) ? 'selected="selected"' : ''; ?>>{{ $val }}</option>
	    	@endforeach
	    </select>
    </p>
    <p class="target_value" id="target_content" <?php echo ($target_type == 'content') ? '' : 'style="display: none;"' ?>>
	    <label>Target Value</label>
	    <select id="target_value" name="target_value_content">
	    	@if ($target_types['content']['extendDatas'])
		    	@foreach ($target_types['content']['extendDatas'] as $content)
		    		<option value="{{ $content->id }}" <?php echo ($target_value == $content->id) ? 'selected="selected"' : ''; ?>>{{ $content->title }}</option>
		    	@endforeach
		    @endif
	    </select>
    </p>
    <label>Sorting</label>
    <input type="text" name="sorting" value="{{ $sorting }}" class="input-small" />
  </fieldset>
</form>

@stop