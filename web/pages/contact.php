<?php
include_once("../../global.php");
include_once("$root/web/includes/header.php");
?>


<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
    <h3>Enroll</h3>
</div>
<!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Enroll</h2>
                        <?php include_once("$root/web/includes/msg.php"); ?>

                    </div>
                       <div class="col-lg-8">
                        <form class="form-contact contact_form"  method="post" action="<?=$url;?>web/controllers/handle-enroll.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"  placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"  placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="phone" id="phone" type="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="spec" id="spec" type="spec" placeholder="Speciality">
                                    </div>
                                </div>

                                <?php 
                                
                                $courses = $db->select("id, name ","courses");
                            
                                ?>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="spec">Courses:</label>
                                        <select class="form-control valid" name="course_id" id="course_id">
                                        <?php foreach ($courses as $course) {?>
                                            <option value="<?= $course['id'];?>"><?= $course['name'];?></option>
                                            <?php } ?>
                                        </select>
                
                                    </div>
                                </div>
                               
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Buttonwood, California.</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    

<?php

include_once("$root/web/includes/footer.php");
?>