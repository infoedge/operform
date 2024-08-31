$(function(){
    $( "#orders-myorderdate" ).datepicker({ changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#orders-orderdate", altFormat: "yy-mm-dd" });
    $( "#orders-mydeliverydate" ).datepicker({ changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#orders-deliverydate", altFormat: "yy-mm-dd" });
    /** get clickevent and show modal winddow*/
    $('#modalBtn').click(function(){
        alert('Got to Modal Buton');
        $('#modal').modal('show')
                .find('#modal-content')
                .load($(this).attr('value'));
    });
    
    /***/
    $("#orders-myregion").prop("disabled", "disabled");
    $("#orders-deliverytown").prop("disabled", "disabled");
    $('#orders-mycountry').change( function(){
        var countryid = $(this).val();
        //alert('Country ID: ' + id);
    
    
        $("#orders-myregion").empty();
        $("#orders-myregion").prop("disabled", "disabled");
        $("#orders-deliverytown").empty();
        $("#orders-deliverytown").prop("disabled", "disabled");
    
    
        $.get('index.php?r=revenue/orders/regions-list',
             { id : countryid  },
             function(data){
                 //alert(data);
                var  response = $.parseJSON(data);
               //alert(response);
                $("#orders-myregion").prop("disabled", false);
                     $("#orders-myregion").empty();
                     var count = response.length;

                     if(count === 0) {
                         $("#orders-myregion").empty();
                         $("#orders-myregion").prop("disabled", "disabled");
                         $("#orders-myregion").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");

                     } else {
                         $("#orders-myregion").append("<option value='"+id+"'>..Pick delivery Region..</option>");
                         for(var i = 0; i<count; i++){
                             var id = response[i]['id'];
                             var name = response[i]['regionName'];
                             $("#orders-myregion").append("<option value='"+id+"'>"+name+"</option>");
                         }
                     }
        });
    });
    $('#orders-myregion').change( function(){
        
        var regionid = $(this).val();
        //alert('I am in the constituency!'+ constituencyid);
        $.get('index.php?r=revenue/orders/towns-list',
             { id : regionid  },
             function(data){
                 //alert(data);
                   var  response = $.parseJSON(data);
                  //alert(response);
                   $("#orders-deliverytown").prop("disabled", false);
                        $("#orders-deliverytown").empty();
                        var count = response.length;

                        if(count === 0) {
                            $("#orders-deliverytown").empty();
                            $("#orders-deliverytown").prop("disabled", "disabled");
                            $("#orders-deliverytown").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");
                        } else {
                            $("#orders-deliverytown").append("<option value='"+id+"'>..Pick delivery town..</option>");
                            for(var i = 0; i<count; i++){
                                var id = response[i]['id'];
                                var name = response[i]['townName'];
                                $("#orders-deliverytown").append("<option value='"+id+"'>"+name+"</option>");
                            }
                        }
               });
    });
});