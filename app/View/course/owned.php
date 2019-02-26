
<div class="container">


    <div class="row justify-content-center">


        <?php
        $subView = new View();
        $subView->render('template/usernav', $data['nav']['role']);
        ?>


        <div class="col p-4">
            <h2>Your courses:</h2>
            <div class="row ">
            <?php
            if (!empty($data['shop'])) {
                $items = $data['shop'];
                foreach ($items as $item) {
                    if($item['active']==1){
                    echo '
            
                        <div class="col-sm-4 p-2">
                        <div class="card">';
                    if (!empty($item['img'] )) {
                        echo '
                            <img class="card-img-top" src="' . $item['img'] . '"
                                 alt="' . $item['name'] . ' image">';
                    }
                    echo '
                            <div class="card-body">
                                <h5 class="card-title">' . $item['name'] . '</h5>
                                <p class="card-text">' . $item['description'] . ' </p>
                                <p class="card-text d-flex justify-content-end">
                                    <a href="/Course/course/' . $item['id'] . '" type="" class="btn btn-lg btn-outline-primary font-weight-light col"><i class="fa fa-play pr-2" aria-hidden="true"></i>Show lessons</a>
                                </p>
                            </div>
                        </div>
                        </div>
            
                        ';
                }
                }
            }
            ?>


        </div>
        </div>
    </div>
</div>
