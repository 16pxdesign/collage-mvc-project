<div class="container  d-flex justify-content-center p-4">
    <div class="col-xl-6 col-md-12  align-self-center">
        <form method="post" class=" need-validation" novalidate>


            <div id="alerts"></div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-uppercase" for="username">Username</label>
                        <input type="text" name="user" id="username" class="form-control" required>
                        <div class="invalid-feedback">It can not be empty</div>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-uppercase" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="invalid-feedback">It can not be empty</div>
                    </div>
                </div>
            </div>


            <div class="row d-flex justify-content-center">
                <button class="col-6 col-md-12 btn-success text-uppercase p-2" type="submit">Create your account
                </button>
                <div class="col-auto pt-1 ">
                    <p>Join us! <a href="#">Register here</a>.</p>
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
            var name = $("#user").val();

            $.ajax({
                type: "POST",
                url: "/post.php",
                dataType: "json",
                data: {name: name},
                success: function (data) {
                    if (data.code == "200") {
                        window.location.href = "main.php?get=" + data.msg;
                        // window.location.assign('post.php?get='+data.msg);

                    } else {
                        addAlert(data.msg);

                    }
                }
            });
        }
        form.classList.add('was-validated');

    });

</script>
