@if (app('request')->input('createdSuccess') == 'true')
<div class="alert alert-success" role="alert">
    {{ app('request')->input('alertMessage') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @else
   @if(app('request')->input('createdSuccess') == 'false')
    <div class="alert alert-danger" role="alert">
      {{ app('request')->input('alertMessage') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
@endif