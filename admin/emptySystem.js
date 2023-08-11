// set document  ready function 
$(document).ready(function() {
//  set click event for empty system button   id="btEmptySystem"  
    $("#btEmptySystem").click(function() {
        //  call emptySystem function 

        showToastYN( "aeToastYN3","Confirm System Empty Action","Are you sure you want to delete all records in the system?","20");
       
    })
     
});

function emptySystem() {
    aeLoading()
    $.ajax({
      type: "post",
      data: {
        id: "no data",
      },
      cache: false,
      url: "emptySystem.php",
      dataType: "text",
      success: function (data, status) {
        aeLoading()
        showToast("aeToastS", "SUCCESS!.", "System Emptied Successfully", "20");
      },
      error: function (xhr, status, error) {
         alert(error);
      },
    });
  }



  function handleYesClick3() {
    emptySystem();
    $('.toast').toast('hide');

}

