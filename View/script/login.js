$(document).ready(function () {
    $('.form_area').submit(function(e){
        e.preventDefault();
        let name = $('#user_name').val();
        let password = $('#password').val();
        let formData = new FormData();
        formData.append('name', name);
        formData.append('password', password);

        $.ajax({
            url: 'newLogin',
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
                if(response == "true"){
                    alert('Welcome');
                    window.location.href='home';
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