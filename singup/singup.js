let submitFormButton = document.getElementById("button");
submitFormButton.addEventListener("click", ()=>{
   let userNameInput = document.getElementById("username-input");
   let emailInput = document.getElementById("input-email");
   let passwordInput = document.getElementById("password-input");
   let formData = {
      "username": userNameInput.value,
      "email": emailInput.value,
      "password": passwordInput.value,
   }
   formData = JSON.stringify(formData);
   let makeUserRequest = new XMLHttpRequest();
   makeUserRequest.setRequestHeader("application/json; charset=utf-8");
   makeUserRequest.open("POST", "./adduser.php");
   makeUserRequest.send(formData);
})