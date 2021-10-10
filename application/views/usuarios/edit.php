<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">
  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('usuarios'); ?>">Usuários</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $strTitulo; ?></li>
    </ol>
  </nav>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?= base_url('usuarios') ?>" title="Voltar" class="btn btn-success float-right "><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <form>
        <div class="form-group row">
          <div class="col-md-4">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="first_name" placeholder="Seu nome" value="<?=$objUsuario->first_name;?>">
            <div id="nome" class="form-text">Entre o nome</div>
          </div>
          <div class="col-md-4">
          <label class="form-label">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" placeholder="<?=$objUsuario->?>">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>
  </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->