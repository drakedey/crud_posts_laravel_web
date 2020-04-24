@if (app('request')->input('showAlert') == 'true')
@php
    $context = app('request')->input('context');
@endphp
@if ($context == 'success')
  <div class="alert alert-success" role="alert">
@endif
@if ($context == 'danger')
  <div class="alert alert-danger" role="alert">
@endif
    {{ app('request')->input('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif