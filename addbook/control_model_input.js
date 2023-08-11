
$(document).ready(function(){

    // listen to mshelfnumber change event
    $('#mshelfnumber').change(function(){
        var selectElement = document.getElementById("mshelfnumber");
        var selectedValue = selectElement.value;
        get_cell_number(selectedValue) 
    })

    // click event for #shelfnumberwrapper
    $('#shelfnumberwrapper').click(function(){
        $('#aeminput1').modal('show');
    })  

    $("#aeM_input_done").click(function(){
        $('#aeminput1').modal('hide');

        var selectElement = document.getElementById("mshelfnumber");
        var selectedValue = selectElement.value;
        
        var aeMCellNo = $('#aeMCellNo').val();
        var aeMShelfNo = selectedValue 

        document.getElementById('shelfnumber').textContent = aeMShelfNo;
        document.getElementById('cellnumber').textContent = aeMCellNo;
     
    });

    

})



        
function get_cell_number(id) {

    $.ajax({
      type: "post",
      data: {
        id: id,
      },
      cache: false,
      url: "get_cell_number.php",
      dataType: "text",
      success: function (data, status) {
       

        $('#aeMCellNo').val(data);



      },
      error: function (xhr, status, error) {
        // alert(error);
      },
    });
  }