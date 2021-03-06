
<?php
$this->load->view('common/admin_header');
$this->load->view('common/admin_leftmenu');
?>
<div class="container-fluid">
    <div class="row">
      <div class="main">
        <?php if($this->session->flashdata('success')){?>
          <div class="alert alert-success">      
            <?php echo $this->session->flashdata('success')?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('error')){?>
          <div class="alert alert-danger">      
            <?php echo $this->session->flashdata('error')?>
          </div>
        <?php } ?>
        <h1 class="page-header">Image List
          <button class="btn btn-sm btn-success pull-right" type="button" onClick="window.location.href = 'image/addimages';">Create Images</button>
        </h1>
        <div class="row">   
          <div class="col-sm-12">
            <div>
              <table id="example">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th hidden>Action</th>
            </tr>
        </tfoot>
                <tbody>
                    <?php foreach ($images as $key => $val) {  ?>
                    <tr>
                        <td data-th="Name"><div><?php echo $val->name;?></div></td>
                        <td data-th="Action">
                            <div>
                            <a class="btn btn-success btn-xs"  href=<?php echo base_url().'image/addimages/'. $val->id;?> >Edit</a>
                            <a class="btn btn-danger btn-xs" onclick=delRec(<?php echo "'".$val->id."'";?>) >Delete</a>
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
<script>
    function delRec(id)
    {   
        var check = confirm("Are you sure you want to delete this image???");
        if (check)
        {   res ='';
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>'+'image/Images_dataDelete',
                data: "id=" + id,
                success: function(msg) {
                    window.location.reload();
                }
            });
            return res;
        }
    }
</script>