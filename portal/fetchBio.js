
$(document).ready(function(){
    fillForm();

})

function fillForm() {
    $.ajax({
      type: "post",
      cache: false,
      url: "fetchBio.php",
      dataType: "json",
      data: { user_id: "none"},
      success: function (data, status) {
       //alert(data)
       //check null
  

        $('#user_name').val(data.user_name);
        $('#user_email').val(data.user_email);
        $('#user_phone').val(data.user_phone);
        $('#user_dob').val(data.user_dob);
        $('#registration_date').val(data.registration_date);
        $('#favorite_category').val(data.favorite_category);
        $('#recent_book').val(data.recent_book);

        updateImageSRC2("user-bio-img", data.passport_picture_url)
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  }
  