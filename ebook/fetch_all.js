$(document).ready(function () {

    fetchData();
  });
  
  var selected_row_id = null;
  function fetchData() {
    $.ajax({
      url: "fetch_all.php",
      type: "POST",
      dataType: "json",
      success: function (data) {
      // empty   $("#editable-table tbody")
      $("#editable-table tbody"). empty();

        $.each(data, function (index, record) {
          var row = $("<tr></tr>");
          row.append($("<td style='display: none'></td>").text(record.id));


          var imageUrl;
          if (record.material_type.toLowerCase().includes('word')) {
            imageUrl = "../devimage/word.png";
          } else if (record.material_type.toLowerCase().includes('pdf')) {
            imageUrl = "../devimage/pdf.png";
          } else {
            imageUrl = ""; // Default image URL or leave it empty
          }
          
          row.append($("<td></td>").html('<img src="' + imageUrl + '" alt="Ebook Image" style="width: 100px; height: auto;">'));
          

          row.append($("<td contenteditable='true'></td>").text(record.title));
          row.append($("<td contenteditable='true'></td>").text(record.author));
          row.append($("<td contenteditable='true'></td>").text(record.year));
          row.append(
            $("<td contenteditable='true'></td>").text(record.description)
          );
          row.append($("<td contenteditable='true'></td>").text(record.file_url));
          row.append($("<td></td>").text(record.recdate));
  
          var deleteButton = $("<button></button>").attr(
            "class",
            "btn btn-danger"
          );
          var trashIcon = $("<i></i>").attr("class", "fa fa-trash");
          deleteButton.append(trashIcon);
  
          row.append($("<td></td>").append(deleteButton));
  
          $("#editable-table tbody").append(row);
        });
  
        $("td[contenteditable='true']").on("blur", function () {
          var newValue = $(this).text();
          var cellIndex = $(this).index();
          var id = $(this).closest("tr").children().first().text();
  
          $.ajax({
            url: "edit.php", // Update this to your PHP script to update the book
            type: "POST",
            data: {
              id: id,
              column: cellIndex, // Pass column index to determine which column to update
              value: newValue, // Pass the new value to update
            },
            success: function (data) {
         
            },
            error: function (error) {
             alert("Error updating data:", error);
            },
          });
        });
  
        $(".btn").on("click", function () {
          var id = $(this).closest("tr").children().first().text();
  
          $.ajax({
            url: "detete_item.php", // The URL to your PHP script that deletes the record
            type: "POST",
            data: {
              id: id, // The ID of the record to delete
            },
            success: function (data) {
         //    alert("Delete success:", data);
            },
            error: function (error) {
             // alert("Error deleting data:", error);
            },
          });
          $(this).closest("tr").remove();
        });
  
        // row click event to update image
        $("#editable-table tbody").on("click", "tr", function () {
          var fileUrl = $(this).find(".file-cell").text();
          var id = $(this).children().first().text();
          selected_row_id = id; //
          updateImageView("edit_imageview", fileUrl);
        });
      },
      error: function (error) {
  // alert error message
 // alert(error.message);
      },
    });
  }
  