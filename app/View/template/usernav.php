
<nav class=" d-none d-md-block  col-lg-3 pt-4 red" >

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
            <li class="nav-link pt-0"><a href="/Manage/lesson/add" class="nav-link">Add new lesson</a></li>
        </ul>
    </div>';
}

?>

</nav>

