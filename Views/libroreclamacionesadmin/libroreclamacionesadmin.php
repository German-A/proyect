<?php
headerAdmin($data);
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar Banner</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>p1</th>
                  <th>p2</th>
                  <th>p3</th>
                  <th>p4</th>
                  <th>p5</th>
                  <th>p6</th>
                  <th>p7</th>
                  <th>p8</th>
                  <th>p9</th>
                  <th>p10</th>
                  <th>p11</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>
