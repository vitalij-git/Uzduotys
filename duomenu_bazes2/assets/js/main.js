console.log("sveiki");
$(function() {

    //laikas - ms
    // 1000ms 1s
    // 0.5s = 500ms
    //fadeIn(laikas) - atsirask
    //delay(laikas) - uzdelsk
    //fadeOut(laikas) - isnyk

    // $(".alert").fadeIn(500);
    // $(".alert").delay(2000);
    // $(".alert").fadeOut(300);

    $(".alert").fadeIn(2000).delay(3000).fadeOut(3000);
    $(document).ready(function() {
        $('#description').summernote({

            height: 150,                 // set editor height

             minHeight: null,             // set minimum height of editor

                maxHeight: null,             // set maximum height of editor

                focus: true                  // set focus to editable area after initializing summernote

            });
    });
});