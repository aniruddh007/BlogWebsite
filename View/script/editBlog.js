$(document).ready(function () {
    $('.main-form').submit(function (e) {
        e.preventDefault();
        let title = $('#title').val();
        let content = $('#content').val();
        let image = $('#image')[0].files[0];
        let blogId = $('.main-form').attr('id');
        console.log(blogId);
        console.log(title);
        console.log(image);
        console.log(content);
        if (typeof image == "undefined") {
            let formData = new FormData();
            formData.append('title', title);
            formData.append('content', content);
            formData.append('blogId', blogId);
            $.ajax({
            url: 'withoutImage',
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
                if(response == "true"){
                    alert('Successfully uploaded your blog');
                    window.location.href='myBlogs';
                }
                else{
                    alert(response);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        })
        }
        else {
            let formData = new FormData();
            formData.append('title', title);
            formData.append('image', image);
            formData.append('content', content);
            formData.append('blogId', blogId);
            $.ajax({
            url: 'withImage',
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
                if(response == "true"){
                    alert('Successfully uploaded your blog');
                    window.location.href='myBlogs';
                }
                else{
                    alert(response);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        })
        }
    });
});