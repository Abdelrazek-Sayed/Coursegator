<?php require_once("../../global.php"); ?>
<?php require_once("$root/web/includes/header.php"); ?>


<?php


$page = $request->getHas('page') ? $request->get('page') : 1;


$num = 3;  // courses per page 
$offest = $num * ($page - 1);

$row = $db->selectOne("COUNT(id) AS coursesCount", "courses");

$coursesCount = $row['coursesCount']; // number of courses
$pages = $coursesCount / $num;  // num of pages
$lastpage = ceil($pages);

?>




<title>All courses</title>
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
    <h3>Our Courses</h3>
</div>
<!-- bradcam_area_end -->

<!-- popular_courses_start -->
<div class="popular_courses">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <h3>All Courses</h3>
                </div>
            </div>
        </div>
    </div>

    <?php $allcourses = $db->selectJoin("courses.* , cats.name AS catName", "courses JOIN cats", "courses.cat_id = cats.id"); ?>



    <div class="all_courses">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <?php foreach ($allcourses as $course) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single_courses">
                                    <div class="thumb">
                                        <a href="<?= $url; ?>web/pages/show-course.php?id=<?= $course['id']; ?>">
                                            <img src="<?= $url; ?>/uploads/images/courses/<?= $course['img']; ?> " alt="<?= $course['name']; ?>">
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


<div class="text-center">
    <a <?php if ($page == 1) {
            echo "style = 'pointer-events:none' ";
        } ?> class="btn btn-info" href="<?= $url; ?>web/pages/courses.php?page=<?= $page - 1; ?>">Previous</a>
    <a <?php if ($page == $lastpage) {
            echo "style = 'pointer-events:none' ";
        } ?> class="btn btn-info" href="<?= $url; ?>web/pages/courses.php?page=<?= $page + 1; ?>">Next</a>
</div>

<?php require_once("$root/web/includes/footer.php"); ?>