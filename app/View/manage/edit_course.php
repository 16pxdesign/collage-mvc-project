<div class="container">


    <div class="row justify-content-center">


        <?php
        $subView = new View();
        $subView->render('template/usernav', $data['nav']['role']);
        ?>



        <!--FORM-->
        <div class="col p-4">
            <form class="need-validation p-4" novalidate>
                <label><h2>Add new course</h2></label>
                <div id="alerts"></div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input class="form-control" type="text" name="name"
                                           value="<?php echo isset($data["course"]["name"]) ? $data["course"]["name"]: "" ; ?>" id="name"  required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" type="number" step="0.01" name="price"
                                           value="<?php echo isset($data["course"]["price"]) ? $data["course"]["price"]: "" ; ?>" id="price" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" name="desc" id="desc"><?php echo isset($data["course"]["description"]) ? $data["course"]["description"]: "" ; ?>
                            </textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <div class="form-group">
                            <label>URL</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Image</div>
                                </div>
                                <input type="text" class="form-control" id="img-url" name="url"
                                       value="<?php echo isset($data["course"]["img"]) ? $data["course"]["img"]: "" ; ?>" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php echo $data["course"]["active"] == 1  ? "true" : "false" ; ?>
                    <div class="col mb-3">
                        <div class="mb-2"><b>Settings</b></div>
                        <div class="row">
                            <div class="col">
                                <div class="custom-controls-stacked px-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-active"
                                               <?php echo $data["course"]["active"] == 1  ? "checked=\"\"" : "" ; ?>>
                                        <label class="custom-control-label" for="user-active">Active for users</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>

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
            var name = $("#name").val();
            var price = $("#price").val();
            var url = $("#img-url").val();

            var active = $("#user-active").prop('checked');
            var desc = $("#desc").val();


            $.ajax({
                type: "POST",
                url: "/ProcessManage/updateCourse",
                dataType: "json",
                data: {id: <?php echo $data["course"]["id"];?>, name: name, price: price, url: url, active: active, desc: desc},
                success: function (data) {
                    if (data.code == "200") {
                        console.log("Succes");
                        window.location.href = "/Manage/index";
                    } else {
                        addAlert(data.msg);

                    }
                }
            });
        }
        form.classList.add('was-validated');
    });

</script>