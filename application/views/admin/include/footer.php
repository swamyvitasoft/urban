<?php if($this->uri->segment(2) != '' && $this->uri->segment(2) != 'login' && $this->uri->segment(2) != 'Login' && $this->uri->segment(2) != 'Forgot' && $this->uri->segment(2) != 'forgot') { ?>
           <footer class="footer text-center"><div class="pull-left"><?=$site[0]->footer_left;?></div><div class="pull-right"><?=$site[0]->footer_right;?></div></footer>
        </div>
    </div>
<?php } ?>
	<div id="BaseUri" data-url="<?=admin_url();?>"></div>
	<div id="ajaxMessage"></div>
    <script src="<?=base_url();?>plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
	<script src="<?=base_url();?>plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script src="<?=base_url();?>js/waves.js"></script>
	<?php if($this->uri->segment(2) != '' && $this->uri->segment(2) != 'login' && $this->uri->segment(2) != 'Login' && $this->uri->segment(2) != 'Forgot' && $this->uri->segment(2) != 'forgot') { ?>
    <script src="<?=base_url();?>plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/icheck/icheck.min.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/icheck/icheck.init.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/moment/moment.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/nestable/jquery.nestable.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <?php if($this->uri->segment(2) == 'users' || $this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'tables') { ?>
	<script src="<?=base_url();?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
	<script>
    $('#tables-export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
	<?php } ?>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
	<script src="<?=base_url();?>plugins/ckeditor/ckeditor.js"></script>
	<?=$site[0]->j_links;?>
	<?php if(!empty($site[0]->js)) { ?>
	<script type="text/javascript">
		<?=$site[0]->js;?>
	</script>
	<?php } ?>
	<?php if($this->session->flashdata('alertMessage')) { ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$.toast({
				heading: '<?=$this->session->flashdata('alertMessage')['title'];?>',
				text: '<?=$this->session->flashdata('alertMessage')['message'];?>',
				position: 'top-right',
				loaderBg: '#ff6849',
				icon: '<?=$this->session->flashdata('alertMessage')['status'];?>',
				hideAfter: 3500,
				stack: 6
			})
		});
	</script>
	<?php } ?>
	<?php } ?>
    <script src="<?=base_url();?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>   
</body>
</html>