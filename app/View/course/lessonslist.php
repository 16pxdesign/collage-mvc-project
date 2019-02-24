<div class="container" >
    <div class="row justify-content-center">




        <div class="col-lg-9 px-4 pt-5 ">


            <div class="mb-3 card ">
                <div class="table-responsive-xl">
                    <table class="mb-0 table table-hover">

                        <thead>
                        <tr>
                            <th class="align-middle bt-0" style="width: 10%">No</th>
                            <th class="align-middle bt-0">Lesson</th>
                            <th class="align-middle bt-0" style="width: 10%"></th>
                            <?php
                            if ($data['manage']){
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

                            <td class=\"align-middle \"  >
                                <a href=\"/Course/lesson/" . $item['lessonid'] . "\" class=\"\"><span class=\"badge badge-success badge-pill\">View</span></a>
                            </td>";

                            if ($data['manage']){
                                echo "<td class=\"align-middle\">
                                <a href=\"/Course/lesson/" . $item['lessonid'] . "\" class=\"\"><span class=\"badge badge-warning badge-pill\">Edit</span></a>
                            </td>";
                                echo "<td class=\"align-middle\">
                                <a href=\"/Course/lesson/" . $item['lessonid'] . "\" class=\"\"><span class=\"badge badge-danger badge-pill\">Delete</span></a>
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



