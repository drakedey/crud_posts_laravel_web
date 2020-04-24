
<div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCommentModalLabel">Are you sure that you want to delete this comment?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        This action can not be undone!
      </div>
      {{ Form::open(['route' => 'comment.delete', 'method' => 'delete']) }}
      <div class="modal-footer">
        {{ Form::hidden('id', '', ['id' => 'dele_comment_id']) }}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>