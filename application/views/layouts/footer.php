  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b style="display:none">Version</b> 2.4.0
    </div>
    <strong style="display:none">Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
		<strong>Copyright &copy; <?php echo date('Y'); ?><a href="#"> JimboRee School</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/template/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/template/bower_components/raphael/raphael.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/bower_components/morris.js/morris.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/template/bower_components/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/template/bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/template/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/template/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/template/dist/js/pages/dashboard.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/template/dist/js/demo.js'); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- bootstrap datetimepicker -->
<script type="text/javascript" src="<?php echo base_url('assets/template/bower_components/moment/src/moment.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/bower_components/bootstrap/js/transition.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/bower_components/bootstrap/js/collapse.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/bower_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/plugins/bootstrap-switch/bootstrap-switch.min.js'); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/template/plugins/iCheck/icheck.min.js'); ?>"></script>

<script>
	$(document).ready(function(){
		//Date picker
    $('#datepicker').datepicker({
			autoclose: true,
			minDate: 0
		})
		$('#datetime').datetimepicker({
			autoclose: true,
			minDate: 0
    })
	})
    // $('#table').DataTable({
		// 	'order': 'desc'
		// });
		// $('#table').DataTable({
		// 	"order": [[ 3, "desc" ]]
			// 'paging'      : true,
			// 'lengthChange': true,
			// 'searching'   : true,
			// 'ordering'    : true,
			// 'info'        : true,
			// 'autoWidth'   : true
		// });
	</script>
</body>
</html>