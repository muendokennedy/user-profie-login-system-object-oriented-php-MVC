const moodle = document.querySelector(".manage-moodle");

const editBtn = document.querySelector(".edit-btn button");

const blurredPart = document.querySelector(".blurred-part");

const cancelBtn = document.querySelector(".manage-moodle .moodle-btn-container .cancel");



function showMoodle(){
  moodle.style.display = "block";
  blurredPart.style.opacity = "0.5";
}

cancelBtn.onclick = () => {
  moodle.style.display = "none";
  blurredPart.style.opacity = "1";
}