$(function(){
    $('#towns-countryid').change( function(){
        var countryid = $(this).val();
        //alert('Country ID: ' + id);
//        $.get('index.php?r=township/towns/extract-dialcode',
//             { id : countryid  },
//             function(data){
//                   var  result = $.parseJSON(data);
//                   //alert(result);
//                   //alert(data);
//                   $('#towns-phoneno').val(result);
//        });
    
    
//        $("#towns-regionid").empty();
//        $("#towns-regionid").prop("disabled", "disabled");
        $("#towns-townName").empty();
//        $("#towns-townid").prop("disabled", "disabled");
//    
    
        $.get('index.php?r=general/towns/regions-list',
             { id : countryid  },
             function(data){
                 //alert(data);
                var  response = $.parseJSON(data);
               //alert(response);
                $("#towns-regionid").prop("disabled", false);
                     $("#towns-regionid").empty();
                     var count = response.length;

                     if(count === 0) {
                         $("#towns-regionid").empty();
                         $("#towns-regionid").prop("disabled", "disabled");
                         $("#towns-regionid").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");

                     } else {
                         $("#towns-regionid").append("<option value='"+id+"'>..Pick your Region..</option>");
                         for(var i = 0; i<count; i++){
                             var id = response[i]['id'];
                             var name = response[i]['regionName'];
                             $("#towns-regionid").append("<option value='"+id+"'>"+name+"</option>");
                         }
                     }
        });
    });
    $('#towns-regionid').change(function(){
        $("#towns-townName").empty();
    });
});


