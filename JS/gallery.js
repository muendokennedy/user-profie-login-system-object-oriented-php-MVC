const moodle = document.querySelector(".update-btn");

const addMoodle = document.querySelector(".add-btn");

const addBtn = document.querySelector(".add-button");

const addCancel = document.querySelector(".add-btn .moodle-btn-container .add-cancel");

const editBtn = document.querySelector(".edit-btn button");

const blurredPart = document.querySelector(".blurred-part");

const cancelBtn = document.querySelector(".update-btn .moodle-btn-container cancel");

let deleteLink = moodle.querySelector(".delete");

let editorButtons = document.querySelectorAll(".editorbutton");

deleteContent = "";


editorButtons.forEach((button) =>{ 
  button.addEventListener("click", (e) => {
    e.preventDefault();
    moodle.style.display = "block";
    blurredPart.style.opacity = "0.5";
    deleteContent = `INCLUDES/delete_gallery.php?${e.target.value}`;
  })
});

deleteLink.onclick = (e) => {
  e.target.href = deleteContent;
}

addBtn.onclick = () => {
  addMoodle.style.display = "block";
}

addCancel.onclick = () => {
  addMoodle.style.display = "none";
}

cancelBtn.onclick = () => {
  moodle.style.display = "none";
  blurredPart.style.opacity = "1";
}