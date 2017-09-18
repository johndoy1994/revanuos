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
            <h1 class="page-header">Edit Home</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Home</div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal" action="" name="admin_edithome" id="admin_edithome" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value=<?php echo $setting->id; ?>>
                                <input type="hidden" name="old_img" id="old_img" value=<?php echo $setting->image; ?>>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">Image *:</label>
                                    <div class="col-sm-6">
                                        <img src=<?php echo base_url() . 'uploads/images/setting/' . $setting->image; ?>  width="200"></img>
                                        <input type="file" name="image" id="image" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">Content *:</label>
                                    <div class="col-sm-8">
                                        <textarea id="content" class="form-control ckeditor" rows="3" name="content"><?php echo $setting->content; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">&nbsp;</label>
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                                        <!-- <button class="btn btn-sm btn-primary" type="button"  onClick="window.location.href = 'user-list.html';">Create</button>
                                        <button class="btn btn-sm btn-default" type="submit">Reset</button>-->
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
<script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
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

                                                    if (res_field.length > 0)
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

                                                $("#admin_edithome").validate({
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