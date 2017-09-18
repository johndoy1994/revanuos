<?php
$this->load->view('common/user_header');
if (isset($slider[0]) && !empty($slider[0])) {
   // $sliderImage = "http://localhost/xerces-group/uploads/images/setting/" . $slider[0]->image;
    $sliderImage = base_url()."uploads/8.jpg";
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
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">About Us</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>
    <?php if(isset($setting[0]) && !empty($setting[0]) && $setting[0]->content!=""){ ?>  
    <div class="row">
      <div class="col-lg-12 timeline">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 timeline-image"> <img class="img-circle img-responsive" src="<?php echo base_url(); ?>assets/user/img/about/2.jpg" alt=""> </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9 timeline-panel">
<!--          <div class="timeline-heading">
            <h4>Lorem Ipsum</h4>
            <h4 class="subheading">An Agency is Born</h4>
          </div>-->
          <div class="timeline-body">
            <p class="text-muted"><?php echo $setting[0]->content;  ?></p>
            
          </div>
        </div>
      </div>
    </div>
    <?php } ?>  
  </div>
</section>



<?php
$this->load->view('common/user_footer');
?>