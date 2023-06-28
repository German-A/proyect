<?php
headerAdmin($data);
getModal('modalBanner', $data);
?>

<main class="app-content">


  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>RUC</th>
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
