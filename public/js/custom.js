$(document).ready(function(){

    new DataTable('.datatable_print', {
        dom: 'Bfrtip',
        buttons: [
            'print', 'excel', 'copy',
        ]
    });

    new DataTable('.datatable');

    // Modals
    $('#myModal').on('shown.bs.modal', handleModalShown);
    function handleModalShown(event) {
        // $('#myModal').modal('show');
        var url = $(event.relatedTarget).data('url');
            
        console.log(url);
        var data;
        // var formData = $('#myForm').serialize();
        // console.log(formData);

        $.ajax({
            type: "GET",
            url: url,
            data: data,
            cache: false,
            success: function (data) {
                
                // console.log(data);
                $('.modal-content').html(data);
            },
            error: function(err) {
                console.log(err);
            }
            });
        
    };

    // Hide Session Messages after 5 Seconds
    $(document).ready(function() {
        // Find the popMessage element using jQuery
        var popMessageElement = $('.PopMessage');

        // Hide the popMessage element after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            popMessageElement.slideUp(500);
        }, 5000);
    });
   
})

