
export const updatePreview = imageWrapper => {
    const image = imageWrapper.querySelector("img");
    const file = imageWrapper.querySelector("input[type=file]").files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
        image.src = reader.result;
        });
        reader.readAsDataURL(file);
        image.classList.remove("hidden");
    }
};