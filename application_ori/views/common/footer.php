			<!-- Main Footer -->
			<footer class="main-footer">
				<!-- To the right -->
				<!-- <div class="pull-right hidden-xs">
					Anything you want
				</div> -->
				<!-- Default to the left -->
				<strong>Copyright &copy; <?php print date('Y'); ?> <a href="#">DIALGOA</a>.</strong> All rights reserved.
			</footer>
		</div>
		<!-- ./wrapper -->
		
		<!-- REQUIRED JS SCRIPTS -->
		
		<!-- jQuery 2.2.3 -->
		<script src="<?php print base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
		<!-- Bootstrap 3.3.6 -->
        <script src="<?php print base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php print base_url('js/smoothbox.jquery2.js'); ?>"></script>
		<!-- PACE -->
		<script src="<?php print base_url('plugins/pace/pace.min.js'); ?>"></script>
		<!-- DataTables -->
		<script src="<?php print base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?php print base_url('plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?php print base_url('dist/js/app.min.js'); ?>"></script>
        <script src="<?php print base_url('js/jquery.autocomplete.js'); ?>"></script>
        <script src="<?php print base_url('plugins/chartjs/Chart.js'); ?>"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
        <script src="<?php print base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
		<script src="<?php print base_url('js/main.js'); ?>"></script>
		<script type="text/javascript">
    // dynamic add form fields
$(function(){

    $(document).on('click', '.btn-add', function(e){

        console.log('button clicked');
        e.preventDefault();

        var controlForm = $('.file-controls'),
        currentEntry = $(this).parents('.entry:first'),
        newEntry = $(currentEntry.clone()).appendTo(controlForm);

        console.log(controlForm);
        console.log(currentEntry);
        console.log(newEntry);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
        .removeClass('btn-add').addClass('btn-remove')
        .removeClass('btn-success').addClass('btn-info')
        .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {

        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;

    });

});
</script>


</body>
</html>