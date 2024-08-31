$(function(){
    $('#orderitem-pricelistid').change(function(){
        var prodid = $(this).val();
        //alert("ProductId: "+ prodid);
        $.get('index.php?r=revenue/order-item/prod-price',
             { prodid : prodid  },
             function(data){
                // alert(data);
                var  response = $.parseJSON(data);
                //alert(response);
                $('#orderitem-totalamt').val(response);
            });
    });
});


