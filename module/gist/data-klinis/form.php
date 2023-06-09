<?php

  include_once("module/pasien/profile-pasien.php");

  $id_pasien = isset($_GET['id_pasien']) ? $_GET['id_pasien'] : 'id not found';
  $type_ill = isset($_GET['type_ill']) ? $_GET['type_ill'] : 'type ill not found';
  $id_klinis_gist = isset($_GET['id_klinis_gist']) ? $_GET['id_klinis_gist'] : false;
  
  $keluhan = "";
  $period = "";
  $fam_history = "";
  $lokasi = "";
  $mrcp = "";
  $ct_scan = "";
  $button = "Save";

  if($id_klinis_gist || $id_klinis) {

    if($id_klinis_gist) {
      $query_id = mysqli_query($conn, "SELECT * FROM data_klinis_gist WHERE id_klinis_gist='$id_klinis_gist'");
      $row = mysqli_fetch_assoc($query_id);
    } else {
      $query_id = mysqli_query($conn, "SELECT * FROM data_klinis_gist WHERE id_klinis_gist='$id_klinis'");
      $row = mysqli_fetch_assoc($query_id);
    }

    $keluhan = $row['keluhan'];
    $period = $row['period'];
    $fam_history = $row['fam_history'];
    $lokasi = $row['lokasi'];
    $mrcp = $row['mrcp'];
    $ct_scan = $row['ct_scan'];
    $button = "Update";
    }

?>

<div class="container-content">
  <div class="containerTab" style="background:white">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <h2>Klinis Gist</h2>

    <form action="
            <?php

                if($id_klinis && $id_patologi && $id_data_terapi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_patologi && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi";
                } 
                else if($id_klinis && $id_patologi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                } 
                else if($id_data_terapi && $id_patologi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                } 
                else if($id_data_terapi && $id_klinis && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi&id_klinis=$id_klins&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_patologi) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi";
                } 
                else if($id_klinis && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_data_terapi=$id_data_terapi";
                }
                else if($id_patologi && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi";
                }
                else if($id_patologi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                } 
                else if($id_data_survival && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_survival=$id_data_survival&id_data_terapi=$id_data_terapi";
                }
                else if($id_patologi) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi";
                }
                else if($id_data_terapi) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi";
                }
                else if($id_data_survival) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_survival=$id_data_survival";
                }
                else if($id_klinis) {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis";
                } 
                else {
                  echo BASE_URL."module/$type_ill/data-klinis/action.php?type_ill=$type_ill&id_pasien=$id_pasien";
                }

            ?>
          " method="POST">
      </br>
      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Keluhan Ticker</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="keluhan" value="<?php echo $keluhan; ?>" >
          <?php
              
              $data_keluhan = mysqli_query($conn, "SELECT keluhan FROM data_klinis_gist WHERE dk_gist_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_keluhan)) {
                echo "<option selected value='".$row['keluhan']."'>".$row['keluhan']."</option>";
              }

              $all_keluhan = ["Benjolan", "Nyeri", "Penurunan BB"];

              for($i=0; $i<count($all_keluhan); $i++) {
                if($all_keluhan[$i] != $keluhan) {
                  echo "<option value='".$all_keluhan[$i]."'>".$all_keluhan[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Lama Keluhan</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Lama keluhan..." name="period" value="<?php echo $period; ?>" >Minggu
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Riwayat Keluarga</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="fam_history" value="<?php echo $fam_history; ?>" > 
          <?php
              
              $data_fhis = mysqli_query($conn, "SELECT fam_history FROM data_klinis_gist WHERE dk_gist_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_fhis)) {
                echo "<option selected value='".$row['fam_history']."'>".$row['fam_history']."</option>";
              }

              $all_fhis = ["Ada", "Tidak"];

              for($i=0; $i<count($all_fhis); $i++) {
                if($all_fhis[$i] != $fam_history) {
                  echo "<option value='".$all_fhis[$i]."'>".$all_fhis[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Lokasi</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="lokasi" value="<?php echo $lokasi; ?>" >
          <?php
              
              $data_loc = mysqli_query($conn, "SELECT lokasi FROM data_klinis_gist WHERE dk_gist_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_loc)) {
                echo "<option selected value='".$row['lokasi']."'>".$row['lokasi']."</option>";
              }

              $all_loc = ["Caput", "Carpus", "Caudatus"];

              for($i=0; $i<count($all_loc); $i++) {
                if($all_loc[$i] != $lokasi) {
                  echo "<option value='".$all_loc[$i]."'>".$all_loc[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">MRCP</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="MRCP..." name="mrcp" value="<?php echo $mrcp; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">CT Scan </br> Infiltrasi Organ</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="CT Scan Infiltrasi Organ..." name="ct_scan" value="<?php echo $ct_scan; ?>">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-10">
        <input type="submit" name="button" class="btn btn-primary" value="<?php echo $button; ?>"/>
        </div>
      </div>
    </form>
  </div>
</div>