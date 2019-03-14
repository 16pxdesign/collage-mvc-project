<div class="container">


    <div class="row justify-content-center">


        <?php
        $subView = new View();
        $subView->render('template/usernav', $data['nav']['role']);
        ?>


        <!--FORM-->
        <div class="col p-4">
            <form class="need-validation p-4" novalidate>
                <label><h2>Add new lesson</h2></label>
                <div id="alerts"></div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Lesson Name</label>
                                    <input class="form-control" type="text" name="name" value="" id="name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" name="desc" id="desc"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <div class="form-group">
                            <label>Youtube</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">https://www.youtube.com/watch?v=</div>
                                </div>
                                <input type="text" class="form-control" id="img-url" name="url" >
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
            var url = $("#img-url").val();
            var desc = $("#desc").val();
            var course_id = <?php echo $data["course_id"]; ?>;
            var no = <?php echo $data["no"]; ?>;


            $.ajax({
                type: "POST",
                url: "/ProcessManage/addLesson",
                dataType: "json",
                data: {name: name, course_id: course_id, url: url, no: no, desc: desc},
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