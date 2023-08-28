$(document).ready(function() {  
    $("#addtolist").click(function() {

        update_reading_list(recordID_g,tableName_g)
    })
})


function update_reading_list(resourceID,tableName_g) {
    //alert(resourceID)

    $.ajax({
        type: "post",
        data: {
          resourceID: resourceID,
          tableName: tableName_g,
        },
        cache: false,
        url: "update_reading_list.php",
        dataType: "text",
        success: function (data, status) {

          if(data==1){
            showToast("aeToastS", "SUCCESS", "Resource added to reading list!", 20);
          }
          else if(data==2){
            showToast("aeToastS", "SUCCESS", "reading list is updated", 20);
          }

          
    
          
        },
        error: function (xhr, status, error) {
           alert(error);
        },
      });


}



