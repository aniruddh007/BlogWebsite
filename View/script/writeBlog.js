$(document).ready(function () {
    $('.main-form').submit(function (e) {
        e.preventDefault();
        let title = $('#title').val();
        let content = $('#content').val();
        let image = $('#image')[0].files[0];
        const today = new Date().toISOString().split('T')[0];
        let userId = $('.main-form').attr('id');
        console.log(userId);
        let formData = new FormData();
        formData.append('title', title);
        formData.append('date' , today);
        formData.append('image' , image);
        formData.append('content' , content);
        formData.append('userId' , userId);
        $.ajax({
            url: 'writeBlog',
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
    });
});