<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('form').submit(function (event) { //Trigger on form submit
            $('#name + .throw_error').empty(); //Clear the messages first
            $('#success').empty();

            var postForm = { //Fetch form data
                'name': $('input[name=name]').val() //Store name fields value
            };

            $.ajax({ //Process the form using $.ajax()
                type: 'POST', //Method type
                url: '/Test/in', //Your form processing file url
                data: postForm, //Forms name
                dataType: 'json',
                success: function (data) {

                    if (!data.success) { //If fails
                        if (data.errors.name) { //Returned if any error from process.php
                            $('.throw_error').hide().fadeIn(1000).html(data.errors.name); //Throw relevant error
                        }
                    } else {
                        $('#success').fadeIn(1000).append('<p>' + data.posted + '</p>'); //If successful, than throw a success message

                    }
                }
            });
            event.preventDefault(); //Prevent the default submit
        });




    });
</script>

<div class="containerSubpage">
    <div class="content">

        <form method="post" name="postForm" class="needs-validation" novalidate>
            <span class="throw_error"></span>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">First name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="First name" value="Mark"
                           required>

                    <div class="invalid-feedback">
                        Please enter a message in the textarea.
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="name2">First name</label>
                    <input type="text" class="form-control" name="name2" id="name2" placeholder="2 name" value="Mark2"
                           required>

                    <div class="invalid-feedback">
                        Please enter a message in the textarea.
                    </div>
                </div>

            </div>

            <button class="btn btn-primary" type="submit" value="Send">Submit form</button>
        </form>
        <div id="success"></div>
    </div>
</div>
