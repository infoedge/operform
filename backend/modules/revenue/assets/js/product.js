$(function(){
    $('#producttype-producttypename').blur(function(){
        var prodtype = $('#producttype-producttypename').val();
        //alert('Product Type: ' + prodtype);
        if ( prodtype === '' || prodtype=== NaN){
            alert('You must type a product Name!');
        } else {
            $.get('index.php?r=revenue/product-type/create-code',
             { prodtypename : prodtype  },
             function(data){
                // alert(data);
                var  response = $.parseJSON(data);
                //alert(response);
                $('#producttype-productcode').val(response);
            });
        }
    });
});


