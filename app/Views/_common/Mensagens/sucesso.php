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
		<div class="modal-content bg-success" >
			<div class="modal-body text-center">
				<h3 class="mb-20 font-weight-normal text-white"><?php echo $titulo ?></h3>
				<div class="card" >
					<p class="h1 font-weight-normal text-success"><?php echo $mensagem ?></p>
					<div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div>
				</div>
			</div>
			<div class="modal-footer justify-content-center">						
				<a class=" btn btn-outline-dark border-radius h2 text-dark" href="<?php echo $link ?>">OK</a>
			</div>
		</div>
	</div>
</div>

<?php echo $this->endSection('container') ?>