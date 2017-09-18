<?php
$this->load->view('common/user_header');
if (isset($slider[0]) && !empty($slider[0])) {
    //$sliderImage = "http://localhost/xerces-group/uploads/images/setting/" . $slider[0]->image;
    $sliderImage = base_url()."uploads/3.jpg";
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

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">career</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
        </div>
        <?php
        if (isset($careers) && !empty($careers)) {
            foreach ($careers as $career) {
                ?>
                <div class="row divide-line">
                    <div class="col-lg-12">
                        <h4 class="color-title"><?php echo $career->title; ?></h4>
                        <div class="content-space">
                            <p class="text-muted"><?php echo $career->content; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>
</section>



<?php
$this->load->view('common/user_footer');
?>