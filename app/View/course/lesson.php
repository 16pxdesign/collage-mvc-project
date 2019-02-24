<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container pt-5">
    <div class="row justify-content-center">

        <?php if(!empty($data['url'])){
          echo " <div class=\"col-md-6\">
            <div class=\"ibox float-e-margins\">
                <div class=\"ibox-title\">
                    <h5>Video</h5>
                </div>
                <div class=\"ibox-content\">
                    <figure>
                        <iframe src=\"http://www.youtube.com/embed/". $data['url']."\" frameborder=\"0\" allowfullscreen=\"\" data-aspectratio=\"0.8211764705882353\" style=\"width: 523px; height: 429.475px;\"></iframe>
                    </figure>
                </div>
            </div>
        </div>";
        }
        ?>

        <div class="col">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Video description</h5>
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