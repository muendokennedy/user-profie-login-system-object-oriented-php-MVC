const dataForm = document.querySelector(".form-container");
const nextBtn = document.querySelector(".next");
const previousBtn = document.querySelector(".prev");
const allStepForms = document.querySelectorAll(".step-form");
const allIndicatorBtns = document.querySelectorAll(".indicator-btn");
const errorMessage = document.querySelector(".error-block");

let currentForm = 0;

showCurrentForm(currentForm);

function showCurrentForm(i){
  
  allStepForms[i].style.display = "block";

  if(i == allStepForms.length - 1){
    nextBtn.innerText = "Submit";
  } else {
    nextBtn.innerText = "Next";
  }

  if(i == 0){
    previousBtn.style.display = "none";
  }else{
    previousBtn.style.display = "block";
  }
  allIndicatorBtns[i].classList.add("current");
}

function nextPrev(i){

  if(i == 1 && !emptyInput()){
    return false;

  } else{
    allStepForms[currentForm].style.display = "none";
    currentForm += i;
  }

  if(currentForm >= allStepForms.length){
    dataForm.submit();
    return false;

  } else {
    showCurrentForm(currentForm);
  }
}

function emptyInput(){
  let inputs = allStepForms[currentForm].querySelectorAll("input");
  let textArea = allStepForms[currentForm].querySelectorAll("textarea");
  let allInputs = [...inputs, ...textArea];
  let isvalid = true;
  for(let i = 0; i < allInputs.length; i++){
    if(allInputs[i].value == ""){
      allInputs[i].classList.add("empty");
      isvalid = false;
      errorMessage.style.display = "block";
    }else{
      allInputs[i].classList.remove("empty");
      isvalid = true;
      errorMessage.style.display = "none";
    }
  }
  return isvalid;
}
