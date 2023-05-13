const image = document.getElementById("image");
const showIfHasValue = document.getElementById("result");

image.addEventListener("change", (event) => {
  if (event.target.value) {
    showIfHasValue.style.display = "block";
    const span = document.createElement("span");
    const value = event.target.value;
    showIfHasValue.textContent = value.slice(12);
    showIfHasValue.appendChild(span);
  } else {
    showIfHasValue.style.display = "none";
  }
});

const image_profile = document.getElementById("profile_image");
const image_input = document.getElementById("profile");

image_input.addEventListener("change", (event) => {
  if (event.target.files && event.target.files[0]) {
    var reader = new FileReader();

    reader.onload = (e) => {
      image_profile.setAttribute("src", e.target.result);
    };

    reader.readAsDataURL(event.target.files[0]);
  } else {
    return;
  }
});
