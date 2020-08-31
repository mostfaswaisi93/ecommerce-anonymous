// Image Preview
$(".image").change(function() {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

$(".image_ar").change(function() {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image-ar-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

$(".image_en").change(function() {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image-en-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

$(".icon").change(function() {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.icon-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});