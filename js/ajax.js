document.getElementById("submitAnswerFrm").addEventListener("click", function(event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "You want to submit the form?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.value) {
      document.getElementById("form").submit();
    }
  });
});



$(document).on('submit', '#submitAnswerFrm', function(){
  var examAction = $('#examAction').val();
  if(examAction != ""){
    Swal.fire({
      title: 'Time Out',
      text: "your time is over, please click ok",
      icon: 'warning',
      showCancelButton: false,
      allowOutsideClick: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK!'
    }).then((result) => {
      if (result.value) {
        document.getElementById("form").submit();
      }
    });
  } else {
    setTimeout(submitForm, 50);
  }


},'json');


