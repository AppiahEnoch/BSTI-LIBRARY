document.addEventListener('DOMContentLoaded', function() {
    // Get all action items
    const actionItems = document.querySelectorAll('.action-item');

    actionItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Get the action from the data-action attribute
            const action = e.currentTarget.getAttribute('data-action');

            switch(action) {
                case 'read':
                    handleReadAction();
                    break;
                case 'review':
                    handleReviewAction();
                    break;
                case 'add-to-list':
                    handleAddToListAction();
                    break;
                case 'request':
                    handleRequestAction();
                    break;
                default:
                    console.error('Unknown action:', action);
            }
        });
    });
});

function handleReadAction() {
    var file = materialData.filePath;

    isFilePDF31(file).then(result => {
        if (result.valid && result.type === 'pdf') {
            window.open(file, "_blank"); // This opens the PDF in a new browser tab/window
        } else if (result.type === 'docx') {
            showToast("aeToastE", "FILE DOWNLOADED", "DOWNLOAD TO READ.", 20);
            aeDownload(file)
        } else {
            showToast("aeToastE", "REQUEST FOR THIS BOOK", "ONLY HARD COPY IS AVAILABLE", 20);
        }
    });
}


function handleReviewAction() {

 aeModal2("reviewModal")
    // Your logic here

}

function handleAddToListAction() {
alert('Handling Add to Reading List action');
    // Your logic here
}

function handleRequestAction() {
    alert('Handling Request for Book action');

    
    // Your logic here
}



function isFilePDF31(fileUrl) {
    return fetch(fileUrl, { method: 'HEAD' })
        .then(response => {
            if (response.ok) {
                var type = response.headers.get("Content-Type");
                var size = Number(response.headers.get("Content-Length")) / 1024 / 1024; // Size in MB
                
                if (size > 3) {
                    showToast("aeToastE", "FILE TOO LARGE", "Your file is too large", 20);
                    return { valid: false, type: null };
                }
                
                if (type === "application/pdf") {
                    return { valid: true, type: 'pdf' };
                } else if (type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    return { valid: false, type: 'docx' };
                } else {
                    showToast("aeToastE", "UNSUPPORTED FORMAT", "Please Choose PDF or DOCX File", 20);
                    return { valid: false, type: null };
                }
            } else {
                showToast("aeToastE", "ERROR", "Failed to fetch file", 20);
                return { valid: false, type: null };
            }
        })
        .catch(error => {
            showToast("aeToastE", "ERROR", error.message, 20);
            return { valid: false, type: null };
        });
}


