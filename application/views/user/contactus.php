<?php
$this->load->view('common/user_header');
if (isset($setting[0]) && !empty($setting[0])) {
    //$sliderImage = "http://localhost/xerces-group/uploads/images/setting/" . $setting[0]->image;
    $sliderImage = base_url()."uploads/login_background2.png";
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
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">      
                    <?php echo $this->session->flashdata('success') ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger">      
                    <?php echo $this->session->flashdata('error') ?>
                </div>
            <?php } ?>
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contact Us</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <form name="contactForm" id="cotactUsForm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="name" class="form-control" placeholder="Your Name *" id="name" type="text">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input name="email" class="form-control" placeholder="Your Email *" id="email" type="email">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="file" name="resumr" id="resume" >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Your Message *" id="message"></textarea>
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $(function () {
        var allowedExtensions = ['doc', 'docx', 'pdf'];
        jQuery.validator.addMethod("onlyFileallow", function (value, element)
        {

            var res_field = value;
            var extension = res_field.substr(res_field.lastIndexOf('.') + 1).toLowerCase();
            if (res_field.length >= 0)
            {

                if (allowedExtensions.indexOf(extension) === -1)
                {
                    return false;
                } else {
                    return true;
                }
            }
            return true;
        }, "Please upload files with " + allowedExtensions.join(', ') + " extensions.");
        $("#cotactUsForm").validate({
            rules: {
                // simple rule, converted to {required:true}
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                resumr: {
                    onlyFileallow: true,
                },
                message: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please provide your name.",
                },
                email: {
                    required: "Please provide your email address.",
                },
                resumr: {
                    required: "Please upload resume file.",
                },
                message: {
                    required: "Please enter description.",
                },
            }
        });

    });
</script>