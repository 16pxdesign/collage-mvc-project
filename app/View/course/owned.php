

<div class="container  ">
    <div class="col-11 align-self-center">
        <div class="row">

            <?php
            if (!empty($data)) {
                $items = $data;
                foreach ($items as $item) {
                    if($item['active']==1){
                    echo '
            
                        <div class="col-sm-4 p-4">
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
                                    <a href="" type="" class="btn btn-lg btn-outline-primary font-weight-light col-9"><i class="fa fa-play pr-2" aria-hidden="true"></i>Show lessons</a>
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
