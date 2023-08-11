$(document).ready(function () {
  fetchData();
});

var selected_row_id=null;
function fetchData() {
  $.ajax({
    url: "fetch_all_book.php",
    type: "POST",
    dataType: "json",
    success: function (data) {
      if (data.status === "success") {
        $.each(data.data, function (index, record) {
          
          var row = $("<tr></tr>");
          row.append($("<td></td>").text(record.id));
          row.append(
            $("<td contenteditable='true'></td>").text(record.material_number)
          );
          row.append(
            $("<td contenteditable='true'></td>").text(record.material_type)
          );
          row.append(
            $("<td contenteditable='true'></td>").text(record.shelfno)
          );
          row.append(
            $("<td contenteditable='true'></td>").text(record.uniqueid)
          );
          row.append($("<td contenteditable='true'></td>").text(record.title));
          row.append($("<td contenteditable='true'></td>").text(record.author));
          row.append(
            $("<td contenteditable='true'></td>").text(record.description)
          );
          var imageCell = $(
            "<td class='img-cell' contenteditable='false'></td>"
          ).text(record.image_url);
          row.append(imageCell);

          row.append($("<td></td>").text(record.recdate));
          row.append(
            $("<td contenteditable='true'></td>").text(record.cellnumber)
          );
          row.append($("<td></td>").text(record.materialdate));

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
            url: "update_book.php", // Update this to your PHP script to update the book
            type: "POST",
            data: {
              id: id,
              column: cellIndex, // Pass column index to determine which column to update
              value: newValue, // Pass the new value to update
            },
            success: function (data) {
              console.log("Update success:", data);
            },
            error: function (error) {
              console.log("Error updating data:", error);
            },
          });
        });

        $(".btn").on("click", function () {
          var id = $(this).closest("tr").children().first().text();

          $.ajax({
            url: "delete_book.php", // The URL to your PHP script that deletes the record
            type: "POST",
            data: {
              id: id, // The ID of the record to delete
            },
            success: function (data) {},
            error: function (error) {
              console.log("Error deleting data:", error);
            },
          });
          $(this).closest("tr").remove();
        });

        // row click event to update image
        $("#editable-table tbody").on("click", "tr", function () {
          var imageUrl = $(this).find(".img-cell").text();
          var id = $(this).children().first().text();
          selected_row_id=id; //
          $('#edit_imageview').removeClass('d-none');
          alert(imageUrl)
          updateImageView("edit_imageview", imageUrl);
        });
      } else {
        console.log("Error fetching data:", data.message);
      }
    },
    error: function (error) {
      console.log("Error fetching data:", error);
    },
  });
}
