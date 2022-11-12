$(function() {
    $("#email").keyup(function(){
        var e = $(this).val();
        $.post("./Ajax/checkEmailCustomer", {email: e}, function(data){
            $("#messageEmail").html(data);
        });
    });

    $("#phone").keyup(function(){
        var p = $(this).val();
        $.post("./Ajax/checkPhoneCustomer", {phone: p}, function(data){
            $("#messagePhone").html(data);
        });
    });
})