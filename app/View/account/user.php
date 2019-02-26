
<div class="container">


    <div class="row justify-content-center">


        <?php
        $subView = new View();
        $subView->render('template/usernav', $data['role']);
        ?>


        <div class="col p-4">

            <span>Welcome in your user panel.</span>



        </div>


    </div>
</div>
