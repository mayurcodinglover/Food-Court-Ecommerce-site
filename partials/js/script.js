function send_message()
{
   var name=jQuery("#name").val();
   var phone=jQuery("#phone").val();
   var email=jQuery("#email").val();
   var password=jQuery("#password").val();
   var cpassword=jQuery("#cpassword").val();

   var is_error="";
   if(name=="")
   {
    alert("please Enter name");    
   }
   else if(email=="")
   {
    alert("Please Enter Email");
   }
   else if(phone=="")
   {
    alert("Please Enter Mobile");
   }
   else if(password=="")
   {
    alert("Please Enter password");
   }
   else if(cpassword=="")
   {
      alert("Please Enter confirm password");
   }
   else{
    jQuery.ajax({
        url:'registersubmit.php',
        type:'post',
        data:'name='+name+'&email='+email+'&phone='+phone+'&password='+password+'&cpassword='+cpassword,
        success:function(result){ 
                alert(result);
         if(result.trim()===("Exist").trim())
         {
            window.location.href='register.php';
            alert("user Exist");
         }
         if(result.trim()===("match").trim()){
            window.location.href='register.php';
            alert("password not matched");
         }
         else{
            window.location.href='login.php';
            alert("user inserted success");
         }
        }
    });
   }
   // preventdefault();
}
function send_message2()
{
   
   var email=jQuery("#login_name").val();
   var password=jQuery("#login_password").val();
   alert("hello");
   alert(email);
   alert(password);

   var is_error="";
   if(email=="")
   {
    alert("Please Enter Email");
   }
   else if(password=="")
   {
    alert("Please Enter password");
   }
   else{
    jQuery.ajax({
        url:'loginsubmit.php',
        type:'post',
        data:'email='+email+'&password='+password,
        success:function(result){ 
         alert(result);
         if(result.trim()===("right").trim())
         {
            alert("authenticate");
            window.location.href='index.php';
         }
         if(result.trim()===("wrong").trim())
         {
            alert("not authenticate");
         }                 
        }
    });
   }  
}


 