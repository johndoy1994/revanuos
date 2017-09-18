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

            <h1 class="page-header">Create Services</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create New services</div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal" action="" name="admin_addservices" id="admin_addservices" method="post" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="title" id="title" placeholder="Enter title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-4 control-label">Content:</label>
                                    <div class="col-sm-8">
                                        <textarea id="content" class="form-control ckeditor" rows="3" name="content"></textarea>
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
                                                jQuery.validator.addMethod("lettersonly", function (value, element)
                                                {
                                                    return this.optional(element) || /^[a-z]+$/i.test(value);
                                                }, "Letters only please");

                                                jQuery.validator.addMethod('check_type', function (value, element) {
                                                    return this.optional(element) || value != 0;
                                                }, "Please select site type");

                                                $("#admin_addservices").validate({
                                                    rules: {
                                                        // simple rule, converted to {required:true}
                                                        title: {
                                                            required: true,
                                                        },
                                                    },
                                                    messages: {
                                                        title: {
                                                            required: "Please Enter title",
                                                        },
                                                    }
                                                });

                                            });
</script>