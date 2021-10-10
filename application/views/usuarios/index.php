<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">
  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $strTitulo; ?></li>
    </ol>
  </nav>

  <form>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="" title="Cadastrar novo Usuário" class="btn btn-success float-right "><i class="fas fa-user-plus"></i>&nbsp;Novo</a>
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">


            <thead>
              <tr>
                <th>#</th>
                <th>Usuário</th>
                <th>login</th>
                <th>Ativo</th>
                <th class="text-right no-sort">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($objUsuarios as $strUser) : ?>
                <tr>
                  <td><?php echo $strUser->id ?></td>
                  <td><?php echo $strUser->username ?></td>
                  <td><?php echo $strUser->email ?></td>
                  <td><?php echo $strUser->active ?></td>
                  <td class="text-right">
                    <a title="editar" href="<?= base_url('usuarios/edit/' . $strUser->id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                    <a title="excluir" href="" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->