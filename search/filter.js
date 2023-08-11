
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
})






$(document).ready(function () {
   
    sendData()
})




const classification = document.querySelector('#classification');
const title = document.querySelector('#title');
const author = document.querySelector('#author');
const uniqueId = document.querySelector('#uniqueid');
const materialType = document.querySelector('#material_type');




function sendData() {
    // Create a data object to hold all filter values
    let dataObject = {
        classification: classification.value,
        title: title.value,
        author: author.value,
        uniqueId: uniqueId.value,
        material_type: materialType.value
    };



    $.ajax({
        type: "POST",
        data: dataObject,
        cache: false,
        url: "filter.php",
        dataType: "json",
        success: function (data, status) {

         // alert(data)
        createCardsFromJson(data);

        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        },
    });
}

// Attach event listeners to all filters
[classification, title, author, uniqueId, materialType].forEach(filter => {
    if (filter.nodeName === 'SELECT') {
        filter.addEventListener('change', sendData);
    } else {
        filter.addEventListener('keyup', sendData);
    }
});

