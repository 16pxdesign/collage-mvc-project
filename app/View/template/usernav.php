
<nav class=" d-none d-md-block  col-lg-3 pt-4" style="border-right: solid 1px grey ;">

    <div class="mb-4">
        <span> User panel </span>
        <ul class="nav flex-column">
            <li class="nav-link"><a href="/Account" class="nav-link">Your account</a></li>
            <li class="nav-link pt-0"><a href="/Course" class="nav-link">Your courses</a></li>
        </ul>
    </div>

<?php
if($data>=2){
    echo  '    <span>Admin</span>
    <div class="mb-4">
        <ul class="nav flex-column">
            <li class="nav-link"><a href="/Manage/course/add" class="nav-link">Add new course</a></li>
        </ul>
    </div>';
}

?>

</nav>

