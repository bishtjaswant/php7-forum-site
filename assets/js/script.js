$(function () { 

    
// signup implementation
    $("#sign-form").on('submit', function (e) {  
        e.preventDefault();

    let first = $("#first").val()
    let last = $("#last").val()
    let email = $("#email").val()
    let password = $("#password").val()
    let address = $("#address").val()
    let phone = $("#phone").val();
    let gender = $("input[name='gender']").val();
      
    let userdata={
        first,
        last,
        email,
        password,
        address,
        phone,
        gender
    } 
 
    $.ajax({
        url: "http://localhost/php-online-forum-project/data/users/register.php",
        method: "POST",
        data: userdata,
        cache: false,
        dataType:"json",
        success: function(data){
            console.log(data.msg);
            if (data.status) {
                     $("#modal-footer").html(`<hr/><p class="text-success text-left">${data.msg.toUpperCase()}</p>`);
                     $("#sign-form")[0].reset();
                     setTimeout(() => {
                     $("#modal-footer").html('');
                     }, 2000);
            }else{
                $("#modal-footer").html(`<span class="text-danger">${data.msg}</>`);
            }
        }
      });

    
    });

    // login implementation
    $("#login-frm").on("submit",function (e) { 
              e.preventDefault();
              let email= $("#email").val();
              let password= $("#password").val();
              let userlogin={email,password};
              
    $.ajax({
        url: "http://localhost/php-online-forum-project/data/users/login.php",
        method: "POST",
        data: userlogin,
        cache: false,
        dataType:"json",
        success: function(data){
            console.log(data.msg);
            if (data.status) {
                     $("#modal-footer").html(`<hr/><p class="text-success text-left">${data.msg.toUpperCase()}</p>`);
                     $("#sign-form")[0].reset();
                     setTimeout(() => {
                     $("#modal-footer").html('');
                     }, 2000);
            }else{
                $("#modal-footer").html(`<span class="text-danger">${data.msg}</>`);
            }
        }
      });


     })

});