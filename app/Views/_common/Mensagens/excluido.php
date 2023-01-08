<?php echo $this->extend('_common/layout') ?>
<?php echo $this->section('container') ?>

<!-- chamada da função modal -->
<script type="text/javascript">
$(window).load(function() {
	$('#modalMensagem').modal('show');
});
</script>

<div class="modal fade bd-example-modal-lg" id="modalMensagem" tabindex="-1" role="dialog">
	<div class="modal-dialog " role="document">
		<div class="modal-content bg-danger">
			<div class="modal-body text-center">
				<h3 class="mb-20 text-dark font-weight-normal"><?php echo $titulo ?></h3>
				<div class="card" >
					<p class="h1 font-weight-normal text-danger"><?php echo $mensagem ?></p>					
				<div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
				</div>
			</div>
			<div class="modal-footer justify-content-center">						
					<a class="btn btn-outline-dark border-radius h2 text-dark" href=" <?php echo base_url($link) ?>" >OK </a>
			</div>
		</div>
	</div>
</div>

<?php echo $this->endSection('container') ?>