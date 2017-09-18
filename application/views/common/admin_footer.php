<!--Footer-->
  <div class="sep clearfix"></div>
  <footer class="text-center app-footer"> <small class="text-muted">&copy; <?php echo date('Y'); ?> <?php echo $this->config->item('title'); ?></small> </footer>
  <!--Footer end--> 
</div>
<script type="text/javascript">var baseurl = '<?php echo base_url(); ?>';</script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.dataTables.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	
  $('#example').DataTable({
              "lengthMenu": [ 15, 30, 45, 60, 75 ],
                "order": [[ 0, "desc" ]],
		     });
	$('#example')
            .removeClass( 'display' )
            .addClass('table table-striped table-bordered responsive-table');

    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );         
});

</script>
</body>
</html>

