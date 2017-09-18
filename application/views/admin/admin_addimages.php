<?php
$this->load->view('common/admin_header');
$this->load->view('common/admin_leftmenu');
?>
<div class="container-fluid">
    <div class="row">
        <div class="main">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-warning">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($error)) { ?>
                <div class="alert alert-warning">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            <h1 class="page-header">Create Images</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create New Image</div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal" action="" name="admin_addimages" id="admin_addimages" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">Name *:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">Image *:</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">&nbsp;</label>
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                                        <button class="btn btn-sm btn-default"  type="button" onClick="window.history.back();">Cancel</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('common/admin_footer');
?>

<script>

    $(function () {

        jQuery.validator.addMethod('check_type', function (value, element) {
            return this.optional(element) || value != 0;
        }, "Please select site type");
        var allowedExtensions = ['png', 'jpg', 'gif', 'jpeg'];
        jQuery.validator.addMethod("onlyImageallow", function (value, element)
        {

            var res_field = value;
            var extension = res_field.substr(res_field.lastIndexOf('.') + 1).toLowerCase();

            if (res_field.length >= 0)
            {

                if (allowedExtensions.indexOf(extension) === -1)
                {
                    //alert('Invalid file Format. Only ' + allowedExtensions.join(', ') + ' are allowed.');
                    return false;
                } else {
                    return true;
                }
            }
            return true;
        }, "Please upload file with " + allowedExtensions.join(', ') + " extension.");

        $("#admin_addimages").validate({
            rules: {
                // simple rule, converted to {required:true}
                name: {
                    required: true,
                },
                image: {
                    onlyImageallow: true,
                },
            },
            messages: {
                name: {
                    required: "Please Enter name",
                },
            }
        });

    });
</script>