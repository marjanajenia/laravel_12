// Live Image Upload Script
$("#input_image").change(function () {
    let reader = new FileReader();
    reader.onload = (e) => {
        $("#input_image_preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(this.files[0]);
});
$("#input_image-2").change(function () {
    let reader = new FileReader();
    reader.onload = (e) => {
        $("#input_image_preview-2").attr("src", e.target.result);
    };
    reader.readAsDataURL(this.files[0]);
});
