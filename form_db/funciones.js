function show(mensaje, icon){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: icon,
        title: mensaje
      });
}

function redirectToPage(){
  window.location.href = "http://localhost:8085/form_db/";
}

$(document).ready(function(){
  $(document).on("click", ".open-modal", function () {
    var id = $(this).data('id');
    $(".modal-body #deleteId").val( id );
  });
});

function deleteRecord(){
  var deleteId = document.getElementById('deleteId').value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'views/eliminar.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      show("Data deleted successfully!", 'success');
      // Close the modal or do any other necessary actions
    } else {
      show('Error deleting data.', 'error');
    }
  };
  xhr.send('deleteId=' + encodeURIComponent(deleteId));
}