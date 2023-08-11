
$(document).ready(function(){


    init();

    // listen to change event for #material_image
    $("#material_image").change(function(){

      if(!(isFileImage2("material_image"))){


        return

      }
      $('#material_imageview').removeClass('d-none');
      changeImageSRC("material_image", "material_imageview")
      
    })



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
        document.getElementById('material_number').textContent = data;
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  }
  