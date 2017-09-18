<?php
$this->load->view('common/user_header');
if (isset($setting[0]) && !empty($setting[0])) {
    //$sliderImage = "http://localhost/xerces-group/uploads/images/setting/" . $setting[0]->image;
    $sliderImage = base_url()."uploads/logo1.jpg";
    if ($setting[0]->image != '') {
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
<header class="inner-slider">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome to our Website!</div>
            <div class="intro-heading">It's Nice To Meet You</div>
            <a href="<?php echo base_url(); ?>aboutus" class="page-scroll btn btn-xl">Tell Me More</a> </div>
    </div>
</header>
<!-- Portfolio Grid Section -->
<section id="portfolio" style="background-color: #f9f9f9;" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Portfolio</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($portfolios) && !empty($portfolios)) {
                foreach ($portfolios as $key => $portfolio) {
                    ?>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a href="#portfolioModal<?php echo $key; ?>" class="portfolio-link" data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"> <i class="fa fa-plus fa-3x"></i> </div>
                            </div>
                            <img src="<?php echo base_url(); ?>uploads/images/portfolio/400x289/<?php echo $portfolio->image ?>" class="img-responsive" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4><?php echo $portfolio->name; ?></h4>
                            <!--<p class="text-muted">Graphic Design</p>-->
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<?php
if (isset($portfolios) && !empty($portfolios)) {
    foreach ($portfolios as $key => $portfolio) {
        ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr"><div class="rl"></div></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2><?php echo $portfolio->name; ?></h2>
                                    <!--<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>-->
                                    <img class="img-responsive img-centered" src="<?php echo base_url(); ?>uploads/images/portfolio/<?php echo $portfolio->image ?>" alt="">
                                    <p><?php echo $portfolio->content; ?></p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Portfolio</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
$this->load->view('common/user_footer');
?>