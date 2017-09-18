<?php
$this->load->view('common/user_header');
if (isset($slider[0]) && !empty($slider[0])) {
    //$sliderImage = "http://localhost/xerces-group/uploads/images/setting/" . $slider[0]->image;
    $sliderImage = base_url()."uploads/6.jpg";
    if ($slider[0]->image != '') {
        ?>
        <style>
            header{
                background-image: url("<?php echo $sliderImage; ?>");
            }
        </style>
        <?php
    }
}
?>
<!-- Header -->
<header class="inner-slider">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome to our Website!</div>
            <div class="intro-heading">It's Nice To Meet You</div>
            <a href="<?php echo base_url(); ?>aboutus" class="page-scroll btn btn-xl">Tell Me More</a> </div>
    </div>
</header>

<!-- About Section -->
<section id="about">
    <div class="container">
        <?php
        $count = 0;
        foreach ($testimonial as $val) {
            ?>
            <?php if ($count % 2 == 0) { ?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Testimonial</h2>
                        <h3 class="section-subheading text-muted"></h3>
                    </div>
                </div>
                <div class="row txt-divider">
                    <div class="col-lg-12 timeline">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 timeline-image"> 
                            <?php if ($val->client_image != "") { ?>
                                <img class="img-circle img-responsive" src="<?php echo base_url(); ?>uploads/images/testimonial/200x200/<?php echo $val->client_image; ?>" alt="">
                            <?php } else { ?>
                                <img class="img-circle img-responsive" src="<?php echo base_url(); ?>assets/user/img/about/2.jpg" alt="">

                            <?php } ?>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-9 timeline-panel">
                            <div class="timeline-body">
                                <p class="text-muted"><?php echo $val->content; ?></p>
                            </div>
                            <div class="text-right"><h6><?php echo $val->client_name; ?></h6></div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 timeline-image">&nbsp;</div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row txt-divider">
                    <div class="col-lg-12 timeline">
                        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 timeline-image">&nbsp;</div>
                        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-9 timeline-panel">
                            <div class="timeline-body">
                                <p class="text-muted"><?php echo $val->content; ?></p>
                            </div>
                            <div class="text-right"><h6><?php echo $val->client_name; ?></h6></div>
                        </div>
                        <?php if ($val->client_image != "") { ?>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 timeline-image pull-right"> <img class="img-circle img-responsive" src="<?php echo base_url(); ?>uploads/images/testimonial/200x200/<?php echo $val->client_image; ?>" alt=""> </div>

                        <?php } else { ?>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 timeline-image pull-right"> <img class="img-circle img-responsive" src="<?php echo base_url(); ?>assets/user/img/about/2.jpg" alt=""> </div>

                        <?php } ?>

                    </div>
                </div>
                <?php
            }
            $count++;
        }
        ?>
    </div>
</section>



<?php
$this->load->view('common/user_footer');
?>