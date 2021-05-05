<?php
include_once("../../global.php");
include_once("$root/web/includes/header.php");
?>

<title>Home</title>
<!-- slider_area_start -->
<div class="slider_area ">
    <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-md-6">
                    <div class="illastrator_png">
                        <img src="<?= $url; ?>/assets/img/banner/edu_ilastration.png" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="slider_info">
                        <h3>Learn your <br>
                            Favorite Course <br>
                            From Online</h3>
                        <a href="<?= $url; ?>/courses.php" class="boxed_btn">Browse Our Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- about_area_start -->
<div class="about_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="single_about_info">
                    <h3>Over 7000 Tutorials <br>
                        from 20 Courses</h3>
                    <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god
                        moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness open
                        place day great wherein heaven sixth lesser subdue fowl </p>
                    <a href="#" class="boxed_btn">Enroll a Course</a>
                </div>
            </div>


            <?php

            // courses
            $row = $db->selectOne("COUNT(id) AS courseCount", "courses");
            $courseCount = $row['courseCount'];

            // cats
            $row =  $db->selectOne("COUNT(id) AS catCount", "cats");
            $catCount = $row['catCount'];

            // resrevations
            $row = $db->selectOne("COUNT(id) AS resCount", "reservations");
            $resCount = $row['resCount'];

            ?>


            <div class="col-xl-6 offset-xl-1 col-lg-6">
                <div class="about_tutorials">
                    <div class="courses">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span><?= $courseCount; ?></span>
                                <p> Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="courses-blue">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span><?= $catCount; ?></span>
                                <p> Categories</p>
                            </div>

                        </div>
                    </div>
                    <div class="courses-sky">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span><?= $resCount; ?>+</span>
                                <p> Enrollments</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<!-- popular_courses_start -->
<div class="popular_courses">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <h3>Latest Courses</h3>
                </div>
            </div>
        </div>
    </div>

    <?php

    $latestcourses = $db->selectJoin(
        "courses.id AS courseId ,courses.name AS courseName,img, cats.name AS catName ",
        "`courses` JOIN cats",
        "courses.cat_id = cats.id",
        " ORDER BY courses.id DESC LIMIT 3"
    );
    ?>
    <div class="all_courses">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">

                        <?php foreach ($latestcourses as $course) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single_courses">
                                    <div class="thumb">
                                        <a href="<?= $url; ?>show-course.php?id=<?= $course['courseId']; ?>">
                                            <img src="<?= $url; ?>uploads/images/courses/<?= $course['img']; ?>">
                                        </a>
                                    </div>
                                    <div class="courses_info">
                                        <span><?= $course['catName']; ?></span>
                                        <h3><a href="<?= $link; ?>/show-course.php?id=<?= $course['courseId']; ?>"> <?= $course['courseName']; ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-xl-12">
                            <div class="more_courses text-center">
                                <a href="<?= $url; ?>courses.php" class="boxed_btn_rev">More Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_courses_end-->


<?php
include_once("$root/web/includes/footer.php");
?>