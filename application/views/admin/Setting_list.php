
<?php
$this->load->view('common/admin_header');
$this->load->view('common/admin_leftmenu');
?>
<div class="container-fluid">
    <div class="row">
        <div class="main">
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
            <h1 class="page-header">Setting List
            </h1>
            <div class="row">   
                <div class="col-sm-12">
                    <div>
                        <table id="example">
                            <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Page</th>
                                    <th>Content</th>
                                    <th hidden>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($setting as $key => $val) { ?>
                                    <tr>
                                        <td data-th="page">
                                            <div>
                                                <?php
                                                if ($val->page_type == 1) {
                                                    echo "Home";
                                                } elseif ($val->page_type == 2) {
                                                    echo "About Us";
                                                } else {
                                                    echo "N/A";
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td data-th="Content"><div>
                                                <?php
                                                if (strlen($val->content) > 50) {
                                                    echo substr($val->content, 0, 47) . "...";
                                                } else {
                                                    echo $val->content;
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td data-th="Action" align="center">
                                            <div>
                                                <?php if ($val->page_type == 1) { ?>
                                                    <a class="btn btn-success btn-sm"  href=<?php echo base_url() . 'setting/edithome/' . $val->id; ?> >Edit</a>
                                                <?php } elseif ($val->page_type == 2) { ?>
                                                    <a class="btn btn-success btn-sm"  href=<?php echo base_url() . 'setting/editabountus/' . $val->id; ?> >Edit</a>
                                                <?php } else{ echo "N/A"; }?>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    <?php
    $this->load->view('common/admin_footer');
    ?>    