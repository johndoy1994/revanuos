<?php
$this->load->view('common/user_header');
if (isset($setting[0]) && !empty($setting[0])) {
    //$sliderImage = "http://localhost/xerces-group/uploads/images/setting/" . $setting[0]->image;
    $sliderImage = "http://localhost/xerces-group/uploads/4.jpg";
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
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name." type="text">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address." type="email">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="file" name="resumr" id="resume">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$this->load->view('common/user_footer');
?>