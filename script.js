

    var click=0;  //to track either show eye icon and hide eye icon are clicked at least once or not   	
   var temp = document.getElementById("password"); //get password node 

    function showHide(){ 
        var password=document.getElementById('password').value;
       if (password.length==0) {//if password cleared upto empty set it to initial states
          click=0; //reset clicked value of eye icons
          temp.type = "password"; // set password node  type="password"
          }

        if (password.length>5) {
          document.getElementById('hidePwd').style.display="flex";

          if(click==1){//if hide eye icon clicked make visible show eye icon even if input is edited  
               document.getElementById('hidePwd').style.display="none";
               document.getElementById('showPwd').style.display="flex";
          }

          else if(click==2){//if show eye icon clicked make visible hide eye icon even if input is edited 
               document.getElementById('hidePwd').style.display="flex";
               document.getElementById('showPwd').style.display="none";
          }
        }

        else if (password.length<5) {//if password length is smaller than 5 then hide eye icons
          document.getElementById('hidePwd').style.display="none";
          document.getElementById('showPwd').style.display="none";
          }
    }

    function show(){
        document.getElementById('hidePwd').style.display="none";
        document.getElementById('showPwd').style.display="flex";
        click=1;
    }

    function hide(){
        document.getElementById('hidePwd').style.display="flex";
        document.getElementById('showPwd').style.display="none";
        click=2;
    }

    // Change the type of input to password or text
   function Toggle() {
       if (temp.type === "password") {
           temp.type = "text";
       }
       else {
           temp.type = "password";
       }
   }