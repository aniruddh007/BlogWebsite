$(document).ready(function () {
    $('.form_area').submit(function (e) {
        e.preventDefault();
        let name = $('#user_name').val();
        let email = $('#userid').val();
        let password = $('#password').val();
        let confirm = $('#confirm').val();
        const today = new Date().toISOString().split('T')[0];

        let formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('date' , today);

        if (password != confirm) {
            alert("Password do not match !");
        } else {
            const strong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
            if (!strong.test(password)) {
                alert("Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol, and be at least 6 characters long.");
            }
            else {
                $.ajax({
                    url: 'newRegistration',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (e) {
                        console.log(e);
                        window.location.href='login';
                    },
                    error: function () {
                        console.error('Error:');
                    }
                })
            }
        }
    });
});