      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <?php foreach($info_box as $info) : ?>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-<?=$info->box;?> elevation-1"
                    ><i class="<?=$info->icon;?>"></i
                  ></span>
                    
                  <div class="info-box-content">
                    <span class="info-box-text"><?=$info->title;?></span>
                    <span class="info-box-number">
                      <?=$info->total;?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="clearfix hidden-md-up"></div>
              <?php endforeach; ?>
            </div>
            <div class="row">
              <div class="col-lg-6">
              </div>
            </div>
          </div>
        </div>
      </div>

      <aside class="control-sidebar control-sidebar-dark">
      </aside>
      
  </body>
</html>
