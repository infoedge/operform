$(function(){
    $( "#article-mystartdate" ).datepicker({ changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#article-startdate", altFormat: "yy-mm-dd" });
    $( "#article-myenddate" ).datepicker({ changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#article-enddate", altFormat: "yy-mm-dd" });
    $("#article-published").change(function(){
        var published=$(this).val();
        var catid = $('#article-catid').val();
        alert('Published Value: '  + published);
        if (published ==='1'){
           $.get('index.php?r=articles/article/next-order',
             { catid : catid  },
             function(data){
                 alert(data);
                var  response = $.parseJSON(data);
               //alert(response);
               $('#article-articleorder').val(response);
           });
        }
    });
});