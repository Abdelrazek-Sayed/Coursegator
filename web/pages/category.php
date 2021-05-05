<?php

require_once("../../global.php");
include("$root/web/includes/header.php");


if ($request->getHas('id')) {
    $id = $request->get('id');
} else {
    $id = 1;
}

$cat = $db->selectOne('name', 'cats', "where id = $id");
if ($cat) {
    $catname = $cat['name'];
} else {
    $catname = "Wrong ID";
}

?>


<title>Show category</title>
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
    <h3><?= $catname; ?></h3>
</div>
<!-- bradcam_area_end -->

<!-- popular_courses_start -->
<div class="popular_courses">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <h3><?= $catname; ?></h3>
                </div>
            </div>
        </div>
    </div>



    <div class="all_courses">
        <div class="container">

            <?php
            $sql = "SELECT courses.* , cats.name AS catName FROM courses JOIN cats
                        ON 
                        courses.cat_id = cats.id
                        WHERE cats.id = $id    
                        ORDER BY courses.id DESC ";

            $result = mysqli_query($db->getConn(), $sql);

            if (mysqli_num_rows($result) == 1) {
                // output data of each row
                $catCourses = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                $catCourses = [];
            }


            ?>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                    <div class="row">
                        <?php foreach ($catCourses as $course) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single_courses">
                                    <div class="thumb">
                                        <a href="<?= $url; ?>web/pages/show-course.php?id=<?= $course['id']; ?>">
                                            <img src="<?= $url; ?>uploads/images/courses/<?= $course['img']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="courses_info">
                                        <span><?= $course['catName']; ?></span>
                                        <h3><a href="<?= $url; ?>web/pages/show-course.php?id=<?= $course['id']; ?>"><?= $course['name']; ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_courses_end-->


<?php include("$root/web/includes/footer.php"); ?>