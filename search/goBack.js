$(document).ready(function () {
 
    $("#goBack").click(function () {
        goBack();


    })

})

function goBack() {
    $.ajax({
      type: "post",
      data: {
        id: "none",
      },
      cache: false,
      url: "check_user_id.php",
      dataType: "text",
      success: function (data, status) {
       if(data==1){

        openPage("../portal/portal.php")
  
       }
       else{
        window.location.href = "../index.php";
       }

       
      },
      error: function (xhr, status, error) {
        // alert(error);
      },
    });
  }