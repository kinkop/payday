@section ('content')
<form method="post" enctype="multipart/form-data" action="{{ $form_action }}">
  <fieldset>
    <legend>{{ $action_title }} {{ View::make('admin/partials/form_toolbar', array('cancel_url' => URL::to('admin/content'))) }}</legend>
    <label for="title">Title</label>
    <input type="text" placeholder="Title" name="title" id="title" class="input-large" style="width: 400px;" value="{{ $title }}">
    <label>SEO URL</label>
    <input type="text" placeholder="SEO URL" name="seo_url" id="seo_url" class="input-large" style="width: 400px;" value="{{ $seo_url }}">
    <label>Content</label>
    <textarea name="content" id="content">{{ $content }}</textarea>
    <label>Meta Keywords</label>
    <textarea rows="5" style="width: 400px;" name="meta_keywords" id="meta_keywords">{{ $meta_keywords }}</textarea>
    <label>Meta Descriptions</label>
    <textarea rows="5" style="width: 400px;" name="meta_descriptions" id="meta_descriptions">{{ $meta_descriptions }}</textarea>
  </fieldset>
</form>

@stop