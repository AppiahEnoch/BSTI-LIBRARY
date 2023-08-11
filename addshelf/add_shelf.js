
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
})


$(document).ready(function () {
    
    // Listen for change event on the classification select element
    $("#classification").change(function () {
        // Get the value of the selected option
        var selectedValue = $(this).val();
        
        // Perform an action based on the selected option
        if (selectedValue === "Fiction Books") {
            // Remove d-none class from the fiction select element and add it to the non-fiction select element
            $(".wrapper1").removeClass("d-none");
            $(".wrapper2").addClass("d-none");
        } else if (selectedValue === "Non-Fiction Books") {
            // Remove d-none class from the non-fiction select element and add it to the fiction select element
            $(".wrapper2").removeClass("d-none");
            $(".wrapper1").addClass("d-none");
        } else {
            // Add d-none class to both select elements if no valid option is selected
            $(".wrapper1").addClass("d-none");
            $(".wrapper2").addClass("d-none");
        }
    });





    $("#shelf-info-form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        // Collect form data
        var formData = {
          classification: $("#classification").val(),
          fiction_options: $("#fiction_options").val(),
          non_fiction_option: $("#non_fiction_option").val(),
          description: $("#description").val(),
          shelfnumber: $("#shelf_number").text(),
          capacity: $("#capacity").val()
        };
        
        // Send form data to add_shelf.php using AJAX
        $.ajax({
          type: "POST",
          url: "add_shelf_.php",
          data: formData,
          success: function(response) {
            fetch_shelf_items();
            $('#shelf-info-form')[0].reset();
            init();
    showToast("aeToastS", "SUCCESS!", "New Shielf Added  Successfully", "20");

          },
          error: function(xhr, status, error) {

            alert(error);
 
  
          }
        });
      });
});







function submit_data(){


}
