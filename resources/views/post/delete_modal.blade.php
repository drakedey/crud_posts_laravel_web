
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Esta seguro que desea eliminar este post?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You can get this post back.
      </div>
      {{ Form::open(['route' => 'post.softdelete', 'method' => 'delete']) }}
      <div class="modal-footer">
        {{ Form::hidden('id', '', ['id' => 'delete_post_id']) }}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>