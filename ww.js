function fillMaterialForm() {
  $.ajax({
    type: "post",
    cache: false,
    url: "data.php", //Make sure this path is correct.
    data: {
      session_var: "nono"
    },
    dataType: "json",
    success: function (data, status) {

      // Rest of your code
      if (typeof window.materialData !== 'undefined') {
        // Your previous code
      } else {
        console.error('materialData is not defined.');
      }
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
}

// Call the function after the document is fully loaded
$(document).ready(function(){
  fillMaterialForm();
});
