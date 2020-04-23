@if (app('request')->input('createdSucess') == 1)
<div class="alert alert-success" role="alert">
    Post created successfully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @else
  <div class="alert alert-danger" role="alert">
    Error creating post!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif