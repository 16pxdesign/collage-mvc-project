

<div class="container  d-flex justify-content-center p-4">
    <div class="col-xl-6 col-md-12 align-self-center">
        <form method="post" class=" need-validation" novalidate>


            <div class="form-group" id="alerts"></div>

            <div class="form-group">
                <label class="text-uppercase" for="username">Username</label>
                <input type="text" name="user" id="username" class="form-control" required>
                <div class="invalid-feedback">It can not be empty</div>

            </div>
            <div class="form-group">
                <label class="text-uppercase" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="invalid-feedback">It can not be empty</div>
            </div>
            <div class="form-group">
                <label class="text-uppercase" for="password">Repeat Password</label>
                <input type="password" name="password" id="password2" class="form-control" required>
                <div class="invalid-feedback">It can not be empty</div>
            </div>
            <div class="form-group">
                <label class="text-uppercase" for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" required>
                <div class="invalid-feedback">It can not be empty</div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-uppercase" for="firstname">First name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                        <div class="invalid-feedback">It can not be empty</div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-uppercase" for="lastname">Last name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                        <div class="invalid-feedback">It can not be empty</div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button class="col-12 btn-success text-uppercase p-2" type="submit">Create your account</button>
                <div class="col-6 pt-3">
                    <p>Already have an account? <a href="/User/login">Sign in</a>.</p>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.1.3/dist/bootstrap-validate.js"></script>
<script>
    function addAlert(message) {
        var div = $('#alerts');
        div.hide();
        div.append(
            '<div class="alert alert-danger">' +
            '<button type="button" class="close" data-dismiss="alert">' +
            '&times;</button>' + message + '</div>');
        div.fadeIn();
    }
    function cleanAlerts() {
        $('#alerts').empty();
    }
    var form = document.querySelector('.need-validation');
    form.addEventListener('submit', function (event) {
        cleanAlerts();

        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            //ifvalid
            event.preventDefault();

            //assign to valid fields
            var username = $("#username").val();
            var password = $("#password").val();
            var password2 = $("#password2").val();
            var email = $("#email").val();
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();

            $.ajax({
                type: "POST",
                url: "/Auth/login",
                dataType: "json",
                data: {username: username, password: password, password2: password2, email: email, firstname: firstname, lastname: lastname},
                success: function (data) {
                    if (data.code == "200") {
                       // window.location.href = "main.php?get=" + data.msg;
                        // window.location.assign('post.php?get='+data.msg);
                        addAlert(data.msg);

                    } else {
                        addAlert(data.msg);

                    }
                }
            });
        }
        form.classList.add('was-validated');
    });

</script>