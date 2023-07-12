
$(document).ready(function() { 
    getshelfnumber() ;
   // aeM2("aeminput1")
})


function aeM2(modalId) {
    var modalElement = document.getElementById(modalId);
    var modalInstance = bootstrap.Modal.getInstance(modalElement);
    if (modalInstance) {
        modalInstance.toggle();
    } else {
        modalInstance = new bootstrap.Modal(modalElement, {
            keyboard: false
        });
        modalInstance.show();
    }
}


  

    function getshelfnumber() {
        fetch('get_shelf_number.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: "novariable"
            })
        })
        .then(response => response.json())
        .then(data => {
  
            if (data.status === 'success') {
                var select = document.getElementById('mshelfnumber');
                select.innerHTML = "";
            
                // Add a default option
                var defaultOption = document.createElement("option");
                defaultOption.value = ""; // or set it to a default value
                defaultOption.text = "Please select a shelf number"; // or set it to a default text
                select.appendChild(defaultOption);
            
                data.data.forEach(item => {
                    var option = document.createElement("option");
                    option.value = item.shelfnumber;
                    option.text = item.shelfnumber;
                    select.appendChild(option);
                });
            } else {
                alert(data.message);
            }
            
            
            
        
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

