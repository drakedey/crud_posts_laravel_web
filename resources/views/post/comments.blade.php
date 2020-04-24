<div class="comments_section">
  <div class="create_comment">
    {{Form::open(['route' => array('comment.put', $post->id), 'method' => 'PUT'])}}
      <div class="form-group">
        <div class="form-group" id="comment-form-group">
          <label for="body"><b>Comment</b></label>
          {{ Form::hidden('id', '', ['id' => 'id-comment']) }}
          {{ Form::textarea('body', '', ['placeholder' => 'writhe your comment, max 140 characters!', 'class' => 'form-control', 'rows' => '3', 'id' => 'comment-text-area', 'maxlength' => '140']) }}
        </div>
        <div class="button_comment_container">
          <button class="btn btn-primary" type="submit">Comment</button>
          <a class="btn btn-danger" onclick="handleCancelClick()" id="cancel-button">Cancel</a>
        </div>
      </div>
    {{Form::close()}}
  </div>
  @if (!empty($comments))
  @include('post.delete_comment_modal')
  <h4>Comentaries</h4>
  <div class="commentary_list">
    @foreach ($comments as $comment)
        <div class="comment">
          <span class="header_comment">
            <h5>{{ $comment->user->name }}</h5>
          </span>
          <div class="comment_date"> {{ $comment->created_at }} </div>
          <p class = "comment_body"> {{ $comment->body }} </p>
          <div class="options">
            <button type="button" onclick="handleEditComment({{ $comment }})" class="btn btn-link">Edit</button>
            <button type="button"  onclick="handleDeleteComment({{ $comment->id }})" class="btn btn-link">Delete</button>
          </div>
        </div>
    @endforeach
    
  </div>
  @else
    <div class="no_comments">
      <h4>There're no comments yet!</h4>
      <p>be the first!</p>
    </div>
  @endif
</div>