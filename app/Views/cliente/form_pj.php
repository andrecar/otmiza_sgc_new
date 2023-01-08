<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!--##### fomulário de Cliente #####-->
	<?php echo form_open('cliente/salvar'); ?>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<label for="nome_razao" class="control-label mt-2 mb-0 ml-2">NOME DA EMPRESA / RAZÃO SOCIAL</label>
				<input type="text" name="nome_razao" id="nome_razao" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['nome_razao'] : set_value('nome_razao') ?>" autofocus>
				<?php if (!empty($errors['nome_razao'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['nome_razao']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-3 col-md-3">
				<label for="nascimento" class="control-label mt-2 mb-0 ml-2">FUNDAÇÃO</label>
				<input type="date" name="nascimento" id="nascimento" class="form-control" value="<?php echo isset($empresa) ? $empresa['nascimento'] : set_value('nascimento') ?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<label for="responsavel" class="control-label mt-2 mb-0 ml-2">RESPONSÁVEL</label>
				<input type="text" name="responsavel" id="responsavel" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['responsavel'] : set_value('responsavel') ?>">
				<?php if (!empty($errors['responsavel'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['responsavel']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<label for="cpf_cnpj" class="control-label mt-2 mb-0 ml-2" >CNPJ</label>
				<input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" data-mask="##.###.###/####-##" value="<?php echo isset($empresa) ? $empresa['cpf_cnpj'] : set_value('cpf_cnpj') ?>">
				<?php if (!empty($errors['cpf_cnpj'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['cpf_cnpj']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-6 col-md-6">
				<label for="rg_escricao" class="control-label mt-2 mb-0 ml-2" >ESCRIÇÃO</label>
				<input type="text" name="rg_escricao" id="rg_escricao" class="form-control" data-mask="##.#.###.#######.#" value="<?php echo isset($empresa) ? $empresa['rg_escricao'] : set_value('rg_escricao') ?>">
				<?php if (!empty($errors['rg_escricao'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['rg_escricao']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>  
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<label for="logradouro" class="control-label mt-2 mb-0 ml-2">ENDEREÇO</label>
				<input type="text" name="logradouro" id="logradouro" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['logradouro'] : set_value('logradouro') ?>">
				<?php if (!empty($errors['logradouro'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['logradouro']; ?>
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
				<label for="ponto_referencia" class="control-label mt-2 mb-0 ml-2">PONTO DE REFERÊNCIA</label>
				<input type="text" name="ponto_referencia" id="ponto_referencia" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($empresa) ? $empresa['ponto_referencia'] : set_value('ponto_referencia') ?>">
			</div>
			<div class="col-sm-6 col-md-6">
				<label for="email" class="control-label mt-2 mb-0 ml-2">E-MAIL</label>
				<input type="email" name="email" id="email" class="form-control" oninput="this.value = this.value.toLowerCase()" value="<?php echo isset($empresa) ? $empresa['email'] : set_value('email') ?>">
			</div>
		</div>
		
		<div class="modal-footer mt-3">
			<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
			<button type="submit" class="btn btn-outline-success border-radius">SALVAR</button>
		</div>
		<!-- campo invisivel para identificar o id do usuário  -->
		<input type="hidden" name="id" value="<?php echo isset($empresa) ? $empresa['id'] : set_value('id') ?>">
		<input type="hidden" name="tipo_cadastro" value="2">
	<?php echo form_close() ; ?>  


<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>