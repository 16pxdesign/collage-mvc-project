<div class="container">


    <div class="row justify-content-center">


        <?php
        $subView = new View();
        $subView->render('template/usernav', $data['nav']['role']);
        ?>


        <div class="col p-4">
            <h2>All courses:</h2> <a href="/Manage/course/add"> + Add new</a>
            <div class="row ">
                <?php
                if (!empty($data['all'])) {
                    $items = $data['all'];
                    foreach ($items as $item) {
                        if ($item['active'] == 1) {
                            echo '
            
                        <div class="col-sm-4 p-2">
                        <div class="card">';
                            if (!empty($item['img'])) {
                                echo '
                            <img class="card-img-top" src="' . $item['img'] . '"
                                 alt="' . $item['name'] . ' image">';
                            }
                            echo '
                            <div class="card-body">
                                <h5 class="card-title">' . $item['name'] . '</h5>
                                <p class="card-text">' . $item['description'] . ' </p>
                                <p class="card-text d-flex justify-content-center">
                                   <div class="row">
                                    <div class="col">
                                    <a href="/Manage/course/view/' . $item['id'] . '" >View</a>
                                    </div>
                                    <div class="col">
                                    <a href="/Manage/course/edit/' . $item['id'] . '" >Edit</a>
                                    </div>
                                    <div class="col">
                                    <a href="/Manage/course/delete/' . $item['id'] . '" >Delete</a>
                                    </div>
                                    
                                    </div>
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
