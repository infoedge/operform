$(function(){
    $( "#members-mydob" ).datepicker({ changeYear:true, changeMonth:true, maxDate: "-18Y", dateFormat:"yy-mm-dd", altField: "#members-dob", altFormat: "yy-mm-dd" });
//    $( "#interests-myenddate" ).datepicker({ changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#interests-enddate", altFormat: "yy-mm-dd" });
    $('#members-countryid').change( function(){
        var countryid = $(this).val();
        //alert('Country ID: ' + id);
        $.get('index.php?r=membership/members/extract-dialcode',
             { id : countryid  },
             function(data){
                   var  result = $.parseJSON(data);
                   //alert(result);
                   //alert(data);
                   $('#members-phoneno').val(result);
        });
    
    
        $("#members-regionid").empty();
        $("#members-regionid").prop("disabled", "disabled");
        $("#members-townid").empty();
        $("#members-townid").prop("disabled", "disabled");
    
    
        $.get('index.php?r=membership/members/regions-list',
             { id : countryid  },
             function(data){
                 //alert(data);
                var  response = $.parseJSON(data);
               //alert(response);
                $("#members-regionid").prop("disabled", false);
                     $("#members-regionid").empty();
                     var count = response.length;

                     if(count === 0) {
                         $("#members-regionid").empty();
                         $("#members-regionid").prop("disabled", "disabled");
                         $("#members-regionid").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");

                     } else {
                         $("#members-regionid").append("<option value='"+id+"'>..Pick your Region..</option>");
                         for(var i = 0; i<count; i++){
                             var id = response[i]['id'];
                             var name = response[i]['regionName'];
                             $("#members-regionid").append("<option value='"+id+"'>"+name+"</option>");
                         }
                     }
        });
    });
    $('#members-regionid').change( function(){
        
        var regionid = $(this).val();
        //alert('I am in the constituency!'+ constituencyid);
        $.get('index.php?r=membership/members/towns-list',
             { id : regionid  },
             function(data){
                 //alert(data);
                   var  response = $.parseJSON(data);
                  //alert(response);
                   $("#members-townid").prop("disabled", false);
                        $("#members-townid").empty();
                        var count = response.length;

                        if(count === 0) {
                            $("#members-townid").empty();
                            $("#members-townid").prop("disabled", "disabled");
                            $("#members-townid").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");
                        } else {
                            $("#members-townid").append("<option value='"+id+"'>..Pick your town..</option>");
                            for(var i = 0; i<count; i++){
                                var id = response[i]['id'];
                                var name = response[i]['townName'];
                                $("#members-townid").append("<option value='"+id+"'>"+name+"</option>");
                            }
                        }
               });
    });
});


