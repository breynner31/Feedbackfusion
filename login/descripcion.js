function toggleReplyForm(button) {
  const replyForm = button.nextElementSibling;
  replyForm.style.display =
    replyForm.style.display === "block" ? "none" : "block";
}
