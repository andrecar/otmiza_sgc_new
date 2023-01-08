<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!--##### fom_empresa #####-->
	<?php echo form_open('empresa/salvar'); ?>
		<div class="row">
			<div class="col-sm-6 col-md-2">
				<label for="tipo_empresa" class="control-label mt-2 mb-0 ml-2">TIPO EMPRESA</label>
				<?php $options = [
						'' => 'Selecionar...',	                           
						'MATRIZ' => 'MATRIX',
						'FILIAL' => 'FILIAL'
					] ; ?>
					<?php echo form_dropdown('tipo_empresa', $options, !empty($empresa['tipo_empresa']) ? $empresa['tipo_empresa'] : set_value('tipo_empresa'), ['id' => 'tipo_empresa', 'class' => 'custom-select'])?>
					<?php if (!empty($errors['tipo_empresa'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['tipo_empresa']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-6 col-md-4">
				<label for="fantasia" class="control-label mt-2 mb-0 ml-2">NOME FANTASIA</label>
				<input type="text" name="fantasia" id="fantasia" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['fantasia'] : set_value('fantasia') ?>" autofocus>
				<?php if (!empty($errors['fantasia'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['fantasia']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-6 col-md-6">
				<label for="razao" class="control-label mt-2 mb-0 ml-2">RAZÃO SOCIAL</label>
				<input type="text" name="razao" id="razao" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['razao'] : set_value('razao') ?>">
				<?php if (!empty($errors['razao'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['razao']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<label for="cnpj" class="control-label mt-2 mb-0 ml-2" >CNPJ</label>
				<input type="text" name="cnpj" id="cnpj" class="form-control" data-mask="##.####.####/####-##" value="<?php echo isset($empresa) ? $empresa['cnpj'] : set_value('cnpj') ?>">
				<?php if (!empty($errors['cnpj'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['cnpj']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-6 col-md-6">
				<label for="escricao" class="control-label mt-2 mb-0 ml-2" >ESCRIÇÃO</label>
				<input type="text" name="escricao" id="escricao" class="form-control" data-mask="##.#.###.#######.#" value="<?php echo isset($empresa) ? $empresa['escricao'] : set_value('escricao') ?>">
				<?php if (!empty($errors['escricao'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['escricao']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>  
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<label for="endereco" class="control-label mt-2 mb-0 ml-2">ENDEREÇO</label>
				<input type="text" name="endereco" id="endereco" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['endereco'] : set_value('endereco') ?>">
				<?php if (!empty($errors['endereco'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['endereco']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-2 col-md-2">
				<label for="numero" class="control-label mt-2 mb-0 ml-2">Nº</label>
				<input type="text" name="numero" id="numero" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['numero'] : set_value('numero') ?>">
				<?php if (!empty($errors['numero'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['numero']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-4 col-md-4">
				<label for="bairro" class="control-label mt-2 mb-0 ml-2">BAIRRO</label>
				<input type="text" name="bairro" id="bairro" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['bairro'] : set_value('bairro') ?>">
				<?php if (!empty($errors['bairro'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['bairro']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<label for="cidade" class="control-label mt-2 mb-0 ml-2">CIDADE</label>
				<input type="text" name="cidade" id="cidade" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['cidade'] : set_value('cidade') ?>">
				<?php if (!empty($errors['cidade'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['cidade']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-2 col-md-2">
				<label for="estado" class="control-label mt-2 mb-0 ml-2">EST.</label>
				<?php $options = [
						'' => 'Selecionar...',	                           
						'AC' => 'AC',
						'Al' => 'Al',
						'AM' => 'AM',
						'AP' => 'AP',
						'BA' => 'BA',
						'CE' => 'CE',
						'DF' => 'DF',
						'ES' => 'ES',
						'GO' => 'GO',
						'MA' => 'MA',
						'MT' => 'MT',
						'MS' => 'MS',
						'MG' => 'MG',
						'PA' => 'PA',
						'PB' => 'PB',
						'PR' => 'PR',
						'PE' => 'PE',
						'PI' => 'PI',
						'RJ' => 'RJ',
						'RN' => 'RN',
						'RO' => 'RO',
						'RS' => 'RS',
						'RR' => 'RR',
						'SC' => 'SC',
						'SE' => 'SE',
						'SP' => 'SP',
						'TO' => 'TO'
					] ; ?>
					<?php echo form_dropdown('estado', $options, !empty($empresa['estado']) ? $empresa['estado'] : set_value('estado'), ['id' => 'estado', 'class' => 'custom-select'])?>
					<?php if (!empty($errors['estado'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['estado']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-2 col-md-2">
				<label for="cep" class="control-label mt-2 mb-0 ml-2">CEP</label>
				<input type="text" name="cep" id="cep" class="form-control" data-mask="##.###-###" value="<?php echo isset($empresa) ? $empresa['cep'] : set_value('cep') ?>">
				<?php if (!empty($errors['cep'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['cep']; ?>
					</div>
				<?php endif; ?>	
			</div>
			
			<div class="col-sm-2 col-md-2">
				<label for="telefone" class="control-label mt-2 mb-0 ml-2">FONE</label>
				<input type="text" name="telefone_1" id="telefone_1" class="form-control" data-mask="(##)#.####-####" value="<?php echo isset($empresa) ? $empresa['telefone_1'] : set_value('telefone_1') ?>">
				<?php if (!empty($errors['telefone_1'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['telefone_1']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-2 col-md-2">
				<label for="telefone" class="control-label mt-2 mb-0 ml-2">FONE</label>
				<input type="text" name="telefone_2" id="telefone_2" class="form-control" data-mask="(##)#.####-####" value="<?php echo isset($empresa) ? $empresa['telefone_2'] : set_value('telefone_2') ?>">
				<?php if (!empty($errors['telefone_2'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['telefone_2']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div> 
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<label for="responsavel" class="control-label mt-2 mb-0 ml-2">RESPONSAVEL</label>
				<input type="text" name="responsavel" id="responsavel" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['responsavel'] : set_value('responsavel') ?>">
				<?php if (!empty($errors['responsavel'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['responsavel']; ?>
					</div>
					<?php endif; ?>	
				</div>
				<div class="col-sm-6 col-md-6">
					<label for="fundacao" class="control-label mt-2 mb-0 ml-2" >DATA DA FUNDAÇÃO</label>
					<input type="text" name="fundacao" id="fundacao" class="form-control" data-mask="##/##/####" value="<?php echo isset($empresa) ? $empresa['fundacao'] : set_value('fundacao') ?>">
				</div>
			</div>
		</div>
		
		<div class="modal-footer mt-3">
			<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
			<button type="submit" class="btn btn-outline-success border-radius">SALVAR</button>
		</div>
		<!-- campo invisivel para identificar o id do usuário  -->
		<input type="hidden" name="id" value="<?php echo isset($empresa) ? $empresa['id'] : set_value('id') ?>">
	<?php echo form_close() ; ?>  


<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>