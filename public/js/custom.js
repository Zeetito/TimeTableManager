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


    // Fetch dynamic list
    $('.change_list').on('change', function() {
        var target = $(this).data('target');
        var url = $(this).data('url');
        var variable = $(this).val();

        // console.log(variable);

        // check if variable is not null
        // if (variable) {
            $.ajax({
                type: "GET",
                url: url,
                data: { variable: variable },
                cache: false,
                success: function (data) {
                    $('#'+target).html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        // }
    });


    
})

// Constantly loading complete progress
// Check if dynamic_loading_text h4 exists
function trigger_dynamic_update(){
    if ($('.dynamic_loading_text').length) {

        // function update_dynamic_text() {
            $('.dynamic_loading_text').each(function() {
                var element = $(this);
        
                // Fetch the data from the url
                var url = element.data('url');                
        
                $.ajax({
                    type: "GET",
                    url: url,
                    cache: false,
                    success: function (data) {
                        element.text(data);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        // }
    
        // setInterval(update_dynamic_text, 1000);
    }    

}
