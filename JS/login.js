const passwordField1 = document.getElementById("pwd");
const showBtn = document.querySelector(".input-box .show-btn");

passwordField1.onkeyup = () => {
  if(passwordField1.value){
  showBtn.style.display = "block";
  showBtn.onclick = () => {
    if(passwordField1.type == "password"){
      passwordField1.type = "text";
      showBtn.innerText = "HIDE";
    } else {
      passwordField1.type = "password";
      showBtn.innerText = "SHOW";
      }
    }
  }else if(!passwordField1.value){
    showBtn.style.display = "none";
  }
}