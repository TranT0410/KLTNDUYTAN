$(document).ready(function () {
    $("#postPreview").click(function (e) {
        var formData = new FormData($('#postPreview')[0]);
        formData.append('image', $('.image')[0].files[0]);
        // console.log(formData.get('title'));
        // const formData = Object.fromEntries(new FormData(form).entries());
        $.ajax({
            method: 'POST',
            url: route('admin.post.preview'),
            data: formData,
            processData: false,
            success: function (response) {
                var w = window.open("", "MsgWindow", "width=1000,height=500");
                w.document.write(response);
            }
        });
    });
});
