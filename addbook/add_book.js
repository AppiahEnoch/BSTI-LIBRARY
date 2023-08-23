var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
})

$(document).ready(function () {

    // Listen for change event on the classification select element
    $("#classification").change(function () {
        var selectedValue = $(this).val();
        if (selectedValue === "Fiction") {
            $(".wrapper1").removeClass("d-none");
            $(".wrapper2").addClass("d-none");

        } else if (selectedValue === "Non-Fiction") {
            // Remove d-none class from the non-fiction select element and add it to the fiction select element
            $(".wrapper2").removeClass("d-none");
            $(".wrapper1").addClass("d-none");
          
        } else {
            // Add d-none class to both select elements if no valid option is selected
            $(".wrapper1").addClass("d-none");
            $(".wrapper2").addClass("d-none");
        }
    });


    // click event for aeM_show_details
    $("#aeM_show_details").click(function() {
      get_shelf_description()

      if ($("#inputrow").hasClass("d-none")) {
        $("#inputrow").removeClass("d-none").addClass("d-block");
        $("#detail_shelf_number").removeClass("d-block").addClass("d-none");
      } else {
        $("#detail_shelf_number").removeClass("d-none").addClass("d-block");
        $("#inputrow").removeClass("d-block").addClass("d-none");
      }
    });
    

});




$(document).ready(function() {

  $('#book-info-form').on('submit', function(e) {
      e.preventDefault();
      // Create new FormData instance
      var formData = new FormData(this);
      /* get text  

     
               
                    <span  id="shelfnumber">56</span>
                    Cell: <span id="cellnumber">23</span>
        
    */

  // get text from shelfnumber
  var shelfnumber = document.getElementById("shelfnumber").textContent;
  var cellnumber = document.getElementById("cellnumber").textContent;

  // append to formData
  formData.append('shelfnumber', shelfnumber);
  formData.append('cellnumber', cellnumber);
    var material_number = document.getElementById("material_number").textContent;
      formData.append('material_number', material_number);
      aeLoading()
      $.ajax({
          type: 'POST',
          url: 'add_book_.php',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {

            // alert response
           // alert(response);

            // reload window
            window.location.reload();


            // reset form             $('#book-info-form')
         //   $('#book-info-form'). trigger("reset");

          //  init() 
          //  fetchData()

            showToast("aeToastS", "SUCCESS!", "New Material Added  Successfully", "20");
        
          },
          error: function(error) {
              console.error('An error occurred:', error);
              aeLoading()
              // You could add additional error handling here
          }
      });
  });
});








function get_shelf_description() {

  var selectElement = document.getElementById("mshelfnumber");
  var selectedValue = selectElement.value;
  
  var aeMCellNo = $('#aeMCellNo').val();
  var aeMShelfNo = selectedValue 

  document.getElementById('shelfnumber').textContent = aeMShelfNo;
  document.getElementById('cellnumber').textContent = aeMCellNo;



  $.ajax({
      type: "POST",
      data: {
          id: aeMShelfNo
      },
      cache: false,
      url: "get_shelf_desc.php",
      dataType: "json", // change this to json
      success: function (response, status) {
          if (response.status === 'success') {
              // Update the shelf number
              // alert response
             // alert(response);
              $('#shelf_count').text(aeMShelfNo);
     


              $('#descword').text(response.data[0].description);
              
              // Show the detail_shelf_number_row
             //$('#detail_shelf_number_row').removeClass('d-none');
          } else {
            //  alert(response.message);
          }
      },
      error: function (xhr, status, error) {
          alert(error);
      },
  });
}


