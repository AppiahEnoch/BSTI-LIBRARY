$(document).ready(function () {
    fetch_shelf_items();
});

function fetch_shelf_items() {
    $.get('fetch_shelf_items.php', function(data) {
        var shelfItems = JSON.parse(data);
        var table = $('#editable-table');
        // empty the table
        table.empty();
        $('#shelf-info-form')[0].reset();
        init();

        var headersHTML = `
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Delete</th>
                </tr>
            </thead>
        `;
        var rowsHTML = '<tbody>';

        shelfItems.forEach(function(item) {
            rowsHTML += `
                <tr>
                    <td>${item.id}</td>
                    <td contenteditable="true" data-id="${item.id}" data-field="class1">${item.class1}</td>
                    <td contenteditable="true" data-id="${item.id}" data-field="class2">${item.class2}</td>
                    <td contenteditable="true" data-id="${item.id}" data-field="description">${item.description}</td>
                    <td><button class="delete-btn" data-id="${item.id}"><i class="fa fa-trash"></i></button></td>
                </tr>
            `;
        });

        rowsHTML += '</tbody>';
        
        table.empty().html(headersHTML + rowsHTML);
  
    });

    $('#editable-table').on('blur', 'td[contenteditable="true"]', function() {
        var id = $(this).data('id');
        var field = $(this).data('field');
        var value = $(this).text();
        var data = { id: id };
        data[field] = value;

        $.post('update_shelf_item.php', data, function(response) {
            // handle response
        });
    });

    $('#editable-table').on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        $.post('delete_shelf_item.php', { id: id }, function(response) {
            // Call fetch_shelf_items to refresh the table after deletion
            fetch_shelf_items();
        });
    });
}
