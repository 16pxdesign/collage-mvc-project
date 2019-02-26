

<div class="container">


    <div class="row justify-content-center">


        <?php
        $subView = new View();
        $subView->render('template/usernav');
        ?>

        <div class="col p-4">
        <div class="row">
        <?php if(!empty($data['url'])){
          echo " <div class=\"col-md-6\">
            <div class=\"ibox float-e-margins\">
                <div class=\"ibox-title\">
                    <h5>Video</h5>
                </div>
                <div class=\"ibox-content justify-content-center\">
                    <figure>
                        <iframe src=\"http://www.youtube.com/embed/". $data['url']."\" frameborder=\"0\" allowfullscreen=\"\" data-aspectratio=\"0.8211764705882353\" style=\"width: 313px; height: 255.475px;\"></iframe>
                    </figure>
                </div>
            </div>
        </div>";
        }
        ?>

        <div class="col">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Description</h5>
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>Lesson</strong></h4>

                    <h5>
                        <?php echo $data['name'];?>
                    </h5>
                    <p>
                        <?php echo $data['content'];?>

                    </p>

                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</div>