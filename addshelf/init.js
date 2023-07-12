
$(document).ready(function(){
    init();
})

function init() {
    $.ajax({
      type: "post",
      data: {
        id: "novariable",
      },
      cache: false,
      url: "init.php",
      dataType: "text",
      success: function (data, status) {
        document.getElementById('shelf_number').textContent = data;
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  }
  