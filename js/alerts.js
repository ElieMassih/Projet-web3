function dismissAlert(id, dismiss_time) {
  const dismiss_btn = $("#dismiss-alert-" + id);

  setTimeout(() => {
    dismiss_btn.click();
  }, 2000 * dismiss_time);

  setTimeout(() => {
    $("#" + id).remove();
  }, 3000 * dismiss_time);
}
