const deleteCommentInput = document.querySelector("#dele_comment_id");
const delemteCommentModal = $("#deleteCommentModal");

const editCommentInput = document.querySelector("#comment-text-area");
const editCommentIdInput = document.querySelector("#id-comment");
const cancelEditButton = document.querySelector("#cancel-button");

const handleDeleteComment = id => {
  console.log('clicking')
  delemteCommentModal.modal('show');
  deleteCommentInput.value = id;
}

const handleEditComment = comment => {
  console.log(comment);
  editCommentInput.value = comment.body;
  editCommentIdInput.value = comment.id;
  cancelEditButton.style.display = 'block';
}

const handleCancelClick = (e) => {
  cancelEditButton.style.display = 'none';
  editCommentInput.value = '';
  editCommentIdInput.value = '';

}