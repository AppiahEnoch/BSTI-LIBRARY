function updateField(field_name, field_value) {
        // Validate email and phone number before sending the request
        if (field_name === 'user_email' && !isValidEmail(field_value)) {
            console.error('Invalid email format');
            return;
          }
          if (field_name === 'user_phone' && !isValidPhone(field_value)) {
            console.error('Invalid phone number format');
            return;
          }

          if (field_name === 'user_name') {
            field_value = field_value.toUpperCase();
          }

          if (field_value.length < 3) {
            console.error('Username must consist of at least 3 characters');
            return;
          }


    $.ajax({
      type: "post",
      url: "updateBio.php",
      dataType: "json",
      data: { field_name: field_name, field_value: field_value },
      success: function (data, status) {

       // alert(data)
        if (data.status === 'success') {
          console.log('Update successful');
        } else {
          console.error('Update failed');
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  }
  
  // Attach blur event handlers to each editable field
  $('.editable-field input').on('blur', function() {
    const field_name = $(this).attr('name');
    const field_value = $(this).val();
    updateField(field_name, field_value);
  });
  


  function isValidEmail(email) {
    // Regular expression to validate email format
    var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return pattern.test(email);
  }
  
  function isValidPhone(phone) {
    // Regular expression to validate phone number (10 digits)
    var pattern = /^[0-9]{10}$/;
    return pattern.test(phone);
  }
