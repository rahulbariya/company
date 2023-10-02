$(document).ready(function () {
    $('#challanDate,#billDate,#creditDate').datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $('#nos').on('keyup change',function (e) {
        $('#meterInput').val($('#nos').val()*2.5);
    });
    //var amountGlobal = 0;
    //$('#rate').focusout(function(){
    $("#rate,#nos").on('focusout change keyup',function (e) {
        //$('#rate').keyup(function(){
        var meter = $('#meterInput').val();
        var rate = $('#rate').val();
        var amount = meter*rate;
        var gst = amount*18/100;
        var TotalAmount = amount + gst;
        $('#amount').val(amount);
        $('#gst').val(gst);
        $('#TotalAmount').val(TotalAmount); //toFixed(2)
    });
    $('#gst').keyup(function(){
        var meter = $('#meterInput').val();
        var rate = $('#rate').val();
        var amount = meter*rate;
        $('#TotalAmount').val(amount);
    });
    $('#btn-close').click(function(){
        //$(".errserver").slideUp("slow");
        $(".errserver").remove();
    });
});