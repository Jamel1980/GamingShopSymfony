function getIdChecked(name_element) {
  let checkboxes = document.getElementsByName(name_element);
  let id = 0;
  checkboxes.forEach((item) => {
    if (item.checked == true) {
      id = item.value;
      stop;
    }
  });
  return id;
}

function onlyOne(checkbox) {
  let checkboxes = document.getElementsByName(checkbox.name);
  checkboxes.forEach((box) => (box.checked = box === checkbox));
}

function previewImage(event, id_image) {
  const image = event.target.files[0];
  if (image) {
    const elt_image = document.getElementById(id_image);
    elt_image.src = URL.createObjectURL(image);
  }
}

// function onlyOne(checkbox) {
//     let checkboxes = document.getElementsByName(checkbox.name);
//     checkboxes.forEach((box) =>{
//         if (box === checkbox) {
//             box.checked = true;
//         } else {
//             box.checked = false;
//         }
//     });
// }
