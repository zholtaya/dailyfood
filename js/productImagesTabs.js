document.addEventListener("DOMContentLoaded", () => {
  const miniImagesElements = document.querySelectorAll(".product-image-wrapper");
  const bigImageElement = document.querySelector(".product-big-image");

  console.log(miniImagesElements);

  const resetAllActiveWrappers = () => {
    miniImagesElements.forEach((element) => {
      element.classList.remove("active-image-wrapper");
    })
  }

  miniImagesElements.forEach((image) => {
    image.addEventListener("click", () => {
      resetAllActiveWrappers();
      bigImageElement.src = image.querySelector(".product-mini-img").src;
      image.classList.add("active-image-wrapper");
    });
  });
});