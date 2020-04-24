const deleteModal = $("#deleteModal");
const deleteInput = document.querySelector("#delete_post_id");

const performDeleteClick = innerId => {
  deleteModal.modal('show');
  deleteInput.value = innerId;
};