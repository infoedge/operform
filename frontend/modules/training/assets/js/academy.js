
$(function(){
    function myalternative(){
        
        return $('#myoption').val(mychoice);
        
    }
    $('#mychoise').change(function(){
        var mychoise = $('#mychoise input:checked').val();
        $('#myoption').val(mychoise);
    });
});


