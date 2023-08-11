$(document).ready(function() {
    // check delete_all_code is clicked
    $('#delete_all_code').click(function() {
        showToastYN("aeToastYN", "Confirm Delete All.", "Are you sure you want to delete all registration codes?", "20");
 


    })

    $('#delete_all_user').click(function() {
        showToastYN("aeToastYN2", "Confirm Delete All.", "Are you sure you want to delete users?", "20");


    })
})




function handleYesClick() {
    $('.toast').toast('hide');
    aeloading()

    $.ajax({
        type: "post",
        data: {
          id: "novariable",
        },
        cache: false,
        url: "delete_registration_code.php",
        dataType: "text",
        success: function (data, status) {
            aeloading()
            showToast("aeToastS", "SUCCESS!.", "All Registration Codes Deleted Successfully", "20");
        
        },
        error: function (xhr, status, error) {
          alert(error);
        },
      });


}

function handleYesClick2() {
    $('.toast').toast('hide');
    aeloading()

    $.ajax({
        type: "post",
        data: {
          id: "novariable",
        },
        cache: false,
        url: "delete_all_user.php",
        dataType: "text",
        success: function (data, status) {
            aeloading()
            showToast("aeToastS", "SUCCESS!.", "All Users Deleted Successfully", "20");
        
        },
        error: function (xhr, status, error) {
          alert(error);
        },
      });
}

function handleNoClick() {
    $('.toast').toast('hide');
}