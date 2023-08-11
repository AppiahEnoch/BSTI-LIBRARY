
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
})


$("document").ready(function () {
  $("#document").change(function () {
    $("#file_icon1").addClass("d-none");
    $("#file_icon2").addClass("d-none");

    if (isFilePDF2("document")) {
      var file = this.files[0];
      var filename = file.name;
      var extension = filename.split(".").pop().toLowerCase();
      if (extension !== "docx") {
        $("#file_icon2").removeClass("d-none");
      } else {
        $("#file_icon1").removeClass("d-none");
      }
    }
  });

  $("#form1").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "insert.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        fetchData();
        showToast( "aeToastE","SUCCESS!","DATA SAVED SUCCESSFULLY","20");

        $("#form1")[0].reset();
        $("#file_icon1").addClass("d-none");
        $("#file_icon2").addClass("d-none");

      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Handle error here
        console.log(jqXHR, textStatus, errorThrown);
      },
    });
  });
});
