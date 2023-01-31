$(document).ready(function () {
    $("#name").change(function(){
        generateSlug($("#name").val())
    });

    const generateSlug = (name, random=false) => {
        $.ajax({
        url: "http://127.0.0.1:8000/admin/slugs/generate",
        type: "POST",
        data: {name, random},
        success: function(data) {
            $("#slug").val(data)
        }
      });
    }

    $("#random-btn").click(function(){
        if(!$("#name").val().trim()) return;
        generateSlug($("#name").val(), true)
    });
});
