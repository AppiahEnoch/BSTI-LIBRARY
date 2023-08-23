var materialData=null;


$(document).ready(function() {

    $('#card-row').on('click', '.card', function() {
        var itemIdFull = $(this).find('.d-none').text();
        var itemIdArray = itemIdFull.split('_'); // split the string into an array on underscore

        var itemId = itemIdArray[0]; // the first item in the array will be the ID
        var tableName = itemIdArray[1]; // the second item in the array will be the table name

        // if tableName  is undifined tableName= book_shelf_view
        if (tableName == undefined) {
            tableName = "book_shelf_view";
        }

        validate(itemId, tableName) 
    });
});


function validate(id, tableName) {
    $.ajax({
      type: "post",
      data: {
        id: id,
        table: tableName,
      },
      cache: false,
      url: "validate_user.php",
      dataType: "text",
      success: function (data, status) {
      
      if(data==1){
        showModel(id, tableName);
      }
      else{

        showToast( "aeToastE","Please Login","You are Required to login into your account in order to have full access","20");
      }
      
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  }


function showModel(id, tableName) {
  materialData=null;
    $.ajax({
      type: "post",
      data: {
        id: id,
        table: tableName,
      },
      cache: false,
      url: "fetch_material.php",
      dataType: "json",
      success: function (data, status) {
        materialData=data;
        aeModal("actionModal")
       
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  }
  