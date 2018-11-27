$(document).ready(function(){

    var product_type_id_input = $('#product_type_id');
    var product_id = $('#product_id');

    var quantity_input = $('#quantity_input');
    var start_date_input = $('#start_date_input');
    var end_date_input = $('#end_date_input');
    var hours_input = $('#hours_input');


    function resetExtraField() {
        start_date_input.hide();
        end_date_input.hide();
        quantity_input.hide();
        hours_input.hide();

    }
    loadProductTypeData();
    function loadProductTypeData(){

        $.ajax({
            'url':'/get-product-type',
            'method':'GET',
            'data':{ },
            'async':false,
            'success':function(data) {

                data = $.parseJSON(data);
                var options = '';

                $.each( data, function( key, value ){
                    options+= '<option value="'+key+'">'+value+'</option>';

                });
                product_type_id_input.empty().append(options);

            }
        });
    };

    function updateItems(product_type_id) {

        if(product_type_id == '' || product_type_id == undefined) {

            return false;

        }
        else if (product_type_id == 1){ //Subscription
            resetExtraField();
            start_date_input.show();
            end_date_input.show();

        }
        else if (product_type_id == 2){ //Service
            resetExtraField();
            hours_input.show();
        }
        else if (product_type_id == 3){ //Goods
            resetExtraField();
            quantity_input.show();
        }

        $.ajax({
            'url':'/get-product-by-type',
            'method':'GET',
            'data':{ product_type_id: product_type_id },
            'async':false,
            'success':function(data) {

                data= $.parseJSON(data);
                var options = '';

                $.each( data, function( key, value ){
                       options+= '<option value="'+key+'">'+value+'</option>';

                });
                product_id.empty().append(options);

            }
        });

        return false;
    }

    product_type_id_input.on('change', function() {
        var product_type_id = $(this).val();
        updateItems(product_type_id);
    });

    updateItems(
        product_type_id_input.find(":selected").val()
    );

    // Handle form submit and validation
    // $( "#register_form" ).submit(function(event) {
    //     var error_message = '';
    //     if(!$("#email").val()) {
    //         error_message+="Please Fill Email Address";
    //     }
    //     if(!$("#password").val()) {
    //         error_message+="<br>Please Fill Password";
    //     }
    //     if(!$("#mobile").val()) {
    //         error_message+="<br>Please Fill Mobile Number";
    //     }
    //     // Display error if any else submit form
    //     if(error_message) {
    //         $('.alert-success').removeClass('hide').html(error_message);
    //         return false;
    //     } else {
    //         return true;
    //     }
    // });

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
    });
});