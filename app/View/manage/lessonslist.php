
<div class="container">


    <div class="row justify-content-center">


        <?php
        $subView = new View();
        $subView->render('template/usernav', $data['nav']['role']);
        ?>


        <div class="col p-4">
            <a href="/Manage/lesson/add/<?php echo $data["course_id"]; ?> "><span class="badge badge-success badge-pill">Add new +</span></a>
            <div class="mb-3 card ">
                <div class="table-responsive-xl">
                    <table class="mb-0 table table-hover">

                        <thead>
                        <tr>
                            <th class="align-middle bt-0" style="width: 10%">No</th>
                            <th class="align-middle bt-0">Lesson</th>
                            <th class="align-middle bt-0" style="width: 10%"></th>
                            <?php
                            if($data['manage']){
                                echo '<th class="align-middle bt-0 " style="width: 10%"> </th>
                            <th class="align-middle bt-0" style="width: 10%"></th>';
                            }
                            ?>

                        </tr>
                        </thead>


                        <tbody>
                        <?php
                        foreach ($data['lessons'] as $item) {
                            echo " <tr>
                            <td class=\"align-middle\">
                                <span>" . $item['no'] . "</span>
                            </td>
                            <td class=\"align-middle\">
                                <div><span>" . $item['name'] . "</span>
                            </td>

                            <td class=\"align-middle \"  >";
                                if(!$data['manage'])
                               echo " <a href=\"/Course/lesson/" . $item['id'] . "\" class=\"\"><span class=\"badge badge-success badge-pill\">View</span></a>";
                                if($data['manage'])
                               echo "<a href=\"/Course/lesson/" . $item['id'] . "\" class=\"\"><span class=\"badge badge-success badge-pill\">View</span></a>";
                            echo "</td>";

                            if ($data['manage']){
                                echo "<td class=\"align-middle\">
                                <a href=\"/Manage/lesson/edit/" . $item['id'] . "\" class=\"\"><span class=\"badge badge-warning badge-pill\">Edit</span></a>
                            </td>";
                                echo "<td class=\"align-middle\">
                                <a href=\"/Manage/lesson/delete/" . $item['id'] . "\" class=\"\"><span class=\"badge badge-danger badge-pill\">Delete</span></a>
                            </td>";
                            }

                        echo  "</tr>";
                        }
                        ?>



                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>



