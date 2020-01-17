$(document).ready(function () {
    function get_index(element_id) {
        var ida = element_id.split('_');
        return(ida[2]);
    }
    function calculate_total(element) {
        var index = get_index(element.id);

        var total = 0;
        var total_tax = 0;
        var total_amount = 0 ;
        var final_amount = 0;

        var mode_item = $('#item_mode_'+ index ).val();
        var mode_weight = $('#item_weight_' + index).val();
        var mode_distance = $('#item_distance_' + index ).val();
        var quantity = $('#item_quantity_' + index).val();
        var tax = $('#item_tax_' + index ).val();
        console.log(mode_item);
        console.log(mode_weight);
        console.log(mode_distance);
        console.log(quantity);
        console.log(tax);
        console.log(total_amount);
        total = (parseInt(mode_item) + parseInt(mode_weight) + parseInt(mode_distance)) * parseInt(quantity);
        $('#price_' + index).val(total);
        total_tax = ((parseInt(total) * parseInt(tax))/100);
        $('#tax_amount_' + index).val(total_tax);

        total_amount = parseInt(total) + parseInt(total_tax);
        $('#total_amount_' + index).val(total_amount);

         

         final_amount += (parseInt(total_amount));
         $('#final_amount_' + index).val(final_amount);




    }
//    $('.item_mode').change(function () {
//        calculate_total(this);
//    });
    $(document).on('change', '.item_mode', function () {
        calculate_total(this);
    });
    $(document).on('change', '.item_weight', function () {
        calculate_total(this);
    });
    $(document).on('change', '.item_distance', function () {
        calculate_total(this);
    });
    $(document).on('change', '.item_unit', function () {
        calculate_total(this);
    });
    $(document).on('change', '.item_quantity', function () {
        calculate_total(this);
    });
     $(document).on('change', '.item_tax', function () {
        calculate_total(this);
    });


//    $('.item_quantity').change($(document).on('change', '.item_weight', function () {
//        calculate_total(this);
//    });


});
