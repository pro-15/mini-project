<?php
include('header.php');
$dao = new DataAccess();
$info = $dao -> getData('depid, depmg', 'dept2');
?>

<!-- Doctors -->
<section data-stellar-background-ratio="1">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Doctors</h2>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                    <img src="user/assets/images/2098/team-image1.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Nate Baston</h3>
                        <p>General Principal</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-020-0120</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">general@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-linkedin-square"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <img src="user/assets/images/2098/team-image3.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Miasha Nakahara</h3>
                        <p>Pregnancy</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-070-0170</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">pregnancy@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                            <li><a href="#" class="fa fa-flickr"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <img src="user/assets/images/2098/team-image2.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Jason Stewart</h3>
                        <p>Cardiology</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-040-0140</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">cardio@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php require('footer.php'); ?>