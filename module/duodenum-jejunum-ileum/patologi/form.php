<?php

  include_once("module/pasien/profile-pasien.php");

  $id_pasien = isset($_GET['id_pasien']) ? $_GET['id_pasien'] : 'id not found';
  $type_ill = isset($_GET['type_ill']) ? $_GET['type_ill'] : 'type ill not found';
  $id_patologi_duodenum = isset($_GET['id_patologi_duodenum']) ? $_GET['id_patologi_duodenum'] : false;
  $id_klinis = isset($_GET['id_klinis']) ? $_GET['id_klinis'] : false;
  $id_patologi = isset($_GET['id_patologi']) ? $_GET['id_patologi'] : false;
  $id_data_terapi = isset($_GET['id_data_terapi']) ? $_GET['id_data_terapi'] : false;
  $id_data_survival = isset($_GET['id_data_survival']) ? $_GET['id_data_survival'] : false;
  
    $tumor = "";
    $node = "";
    $metastasis = "";
    $lokasi_metastasis = "";
    $no_patologi_biopsi = "";
    $tanggal_biopsi = "";
    $jenis_patologi_biopsi = "";
    $no_patologi_operasi_definitif = "";
    $jenis_patologi_operasi_definitif = "";
    $grade_histopatologi = "";
    $reseksi = "";
    $batas_reseksi_proksimal = "";
    $batas_reseksi_distal = "";
    $lvi = "";
    $invasi_perineural = "";
    $catatan_temuan_operasi = "";

    $button = "Save";

  if($id_patologi_duodenum || $id_patologi) {
    if($id_patologi_duodenum) {
      $query_id = mysqli_query($conn, "SELECT * FROM patologi_duodenum WHERE id_patologi_duodenum='$id_patologi_duodenum'");
      $row = mysqli_fetch_assoc($query_id);
    } else {
      $query_id = mysqli_query($conn, "SELECT * FROM patologi_duodenum WHERE id_patologi_duodenum='$id_patologi'");
      $row = mysqli_fetch_assoc($query_id);
    }

    $tumor = $row['tumor'];
    $node = $row['node'];
    $metastasis = $row['metastasis'];
    $lokasi_metastasis = $row['lokasi_metastasis'];
    $no_patologi_biopsi = $row['no_patologi_biopsi'];
    $tanggal_biopsi = $row['tanggal_biopsi'];
    $jenis_patologi_biopsi = $row['jenis_patologi_biopsi'];
    $no_patologi_operasi_definitif = $row['no_patologi_operasi_definitif'];
    $jenis_patologi_operasi_definitif = $row['jenis_patologi_operasi_definitif'];
    $grade_histopatologi = $row['grade_histopatologi'];
    $reseksi = $row['reseksi'];
    $batas_reseksi_proksimal = $row['batas_reseksi_proksimal'];
    $batas_reseksi_distal = $row['batas_reseksi_distal'];
    $lvi = $row['lvi'];
    $invasi_perineural = $row['invasi_perineural'];
    $catatan_temuan_operasi = $row['catatan_temuan_operasi'];

    $button = "Update";
    }

?>

<div class="container-content">
  <div class="containerTab" style="background:white">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <h2>Patologi Duodenum-Jejunum-Ileum</h2>

    <form action="
            <?php 

                if($id_klinis && $id_patologi && $id_data_terapi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_patologi && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi";
                } 
                else if($id_klinis && $id_patologi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                } 
                else if($id_data_terapi && $id_patologi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                } 
                else if($id_data_terapi && $id_klinis && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi&id_klinis=$id_klins&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_patologi) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi";
                } 
                else if($id_klinis && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_data_terapi=$id_data_terapi";
                }
                else if($id_patologi && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi";
                }
                else if($id_patologi && $id_data_survival) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                } 
                else if($id_data_survival && $id_data_terapi) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_survival=$id_data_survival&id_data_terapi=$id_data_terapi";
                }
                else if($id_patologi) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi";
                }
                else if($id_data_terapi) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi";
                }
                else if($id_data_survival) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_survival=$id_data_survival";
                }
                else if($id_klinis) {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis";
                } 
                else {
                  echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien";
                }

              echo BASE_URL."module/$type_ill/patologi/action.php?type_ill=$type_ill&id_pasien=$id_pasien"; 
            ?>
          " method="POST">
      </br>
      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Tumor</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="tumor" value="<?php echo $tumor; ?>" >
          <?php
              
              $data_tumor = mysqli_query($conn, "SELECT tumor FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_tumor)) {
                echo "<option selected value='".$row['tumor']."'>".$row['tumor']."</option>";
              }

              $all_tumor = ["T1", "T2", "T3", "T4"];

              for($i=0; $i<count($all_tumor); $i++) {
                if($all_tumor[$i] != $tumor) {
                  echo "<option value='".$all_tumor[$i]."'>".$all_tumor[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Node</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="node" value="<?php echo $node; ?>" >
          <?php
              
              $data_node = mysqli_query($conn, "SELECT node FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_node)) {
                echo "<option selected value='".$row['node']."'>".$row['node']."</option>";
              }

              $all_node = ["N0", "N1", "N2"];

              for($i=0; $i<count($all_node); $i++) {
                if($all_node[$i] != $node) {
                  echo "<option value='".$all_node[$i]."'>".$all_node[$i]."</option>";
                }
              }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Metastasis</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="metastasis" value="<?php echo $metastasis; ?>" >
          <?php
              
              $data_meta = mysqli_query($conn, "SELECT metastasis FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_meta)) {
                echo "<option selected value='".$row['metastasis']."'>".$row['metastasis']."</option>";
              }

              $all_meta = $all_meta = ["M0", "M1"];

              for($i=0; $i<count($all_meta); $i++) {
                if($all_meta[$i] != $metastasis) {
                  echo "<option value='".$all_meta[$i]."'>".$all_meta[$i]."</option>";
                }
              }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Lokasi Mestastasis</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="lokasi_metastasis" value="<?php echo $lokasi_metastasis; ?>" >
          <?php
              
              $data_locmeta = mysqli_query($conn, "SELECT lokasi_metastasis FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_locmeta)) {
                echo "<option selected value='".$row['lokasi_metastasis']."'>".$row['lokasi_metastasis']."</option>";
              }

              $all_locmeta = ["Paru", "Hati", "Peritoneal", "Otak", "Tulang"];

              for($i=0; $i<count($all_locmeta); $i++) {
                if($all_locmeta[$i] != $lokasi_metastasis) {
                  echo "<option value='".$all_locmeta[$i]."'>".$all_locmeta[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">No. Patologi Biopsi</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="inputPassword3" placeholder="No. Patologi Biopsi..." name="no_patologi_biopsi" value="<?php echo $no_patologi_biopsi; ?>" >Minggu
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Biopsi</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="inputPassword3" name="tanggal_biopsi" value="<?php echo $tanggal_biopsi; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Jenis Patologi Biopsi</label>
        <div class="col-sm-10">
          <input type="text" list="all_jbiop" class="form-control" name="jenis_patologi_biopsi" value="<?php echo $jenis_patologi_biopsi; ?>"/>
            <datalist id="all_jbiop">
            <?php
              
              $data_jbiop = mysqli_query($conn, "SELECT jenis_patologi_biopsi FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_jbiop)) {
                echo "<option selected value='".$row['jenis_patologi_biopsi']."'>".$row['jenis_patologi_biopsi']."</option>";
              }

              $all_jbiop = ["Adenocarcinoma", "Squamous Cell Carcinoma", "Lainnya"];

              for($i=0; $i<count($all_jbiop); $i++) {
                if($all_jbiop[$i] != $jenis_patologi_biopsi) {
                  echo "<option value='".$all_jbiop[$i]."'>".$all_jbiop[$i]."</option>";
                }
              }
          ?>
            </datalist>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">No. Patologi </br> Operasi Definitif</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="No. Patologi Operasi Definitif..." name="no_patologi_operasi_definitif" value="<?php echo $no_patologi_operasi_definitif; ?>" >
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Jenis Patologi </br> Operasi Definitif</label>
        <div class="col-sm-10">
          <input type="text" list="all_jopdef" class="form-control" name="jenis_patologi_operasi_definitif" value="<?php echo $jenis_patologi_operasi_definitif; ?>"/>
          <datalist id="all_jopdef">
          <?php
              
              $data_jopdef = mysqli_query($conn, "SELECT jenis_patologi_operasi_definitif FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_jopdef)) {
                echo "<option selected value='".$row['jenis_patologi_operasi_definitif']."'>".$row['jenis_patologi_operasi_definitif']."</option>";
              }

              $all_jopdef = ["Adenocarcinoma", "Squamous Cell Carcinoma", "Lainnya"];

              for($i=0; $i<count($all_jopdef); $i++) {
                if($all_jopdef[$i] != $jenis_patologi_operasi_definitif) {
                  echo "<option value='".$all_jopdef[$i]."'>".$all_jopdef[$i]."</option>";
                }
              }
          ?>
          </datalist>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Grade Histopatologi</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="grade_histopatologi" value="<?php echo $grade_histopatologi; ?>" >
          <?php
              
              $data_grade = mysqli_query($conn, "SELECT grade_histopatologi FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_grade)) {
                echo "<option selected value='".$row['grade_histopatologi']."'>".$row['grade_histopatologi']."</option>";
              }

              $all_grade = ["I", "II", "III"];

              for($i=0; $i<count($all_grade); $i++) {
                if($all_grade[$i] != $grade_histopatologi) {
                  echo "<option value='".$all_grade[$i]."'>".$all_grade[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Reseksi</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="reseksi" value="<?php echo $reseksi; ?>" >
          <?php
              
              $data_reseksi = mysqli_query($conn, "SELECT reseksi FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_reseksi)) {
                echo "<option selected value='".$row['reseksi']."'>".$row['reseksi']."</option>";
              }

              $all_reseksi = ["R0", "R1", "R2"];

              for($i=0; $i<count($all_reseksi); $i++) {
                if($all_reseksi[$i] != $reseksi) {
                  echo "<option value='".$all_reseksi[$i]."'>".$all_reseksi[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Batas Reseksi Proksimal</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Batas Reseksi Proksimal..." name="batas_reseksi_proksimal" value="<?php echo $batas_reseksi_proksimal; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Batas Reseksi Distal</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Batas Reseksi Distal..." name="batas_reseksi_distal" value="<?php echo $batas_reseksi_distal; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">LVI</label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="lvi" value="<?php echo $lvi; ?>" >
          <?php
              
              $data_lvi = mysqli_query($conn, "SELECT lvi FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_lvi)) {
                echo "<option selected value='".$row['lvi']."'>".$row['lvi']."</option>";
              }

              $all_lvi = ["Negatif", "Positif"];

              for($i=0; $i<count($all_lvi); $i++) {
                if($all_lvi[$i] != $lvi) {
                  echo "<option value='".$all_lvi[$i]."'>".$all_lvi[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Invasi Perineural </label>
        <div class="col-sm-10">
          <select id="inputState" class="form-control" name="invasi_perineural" value="<?php echo $invasi_perineural; ?>" >
          <?php
              
              $data_inv = mysqli_query($conn, "SELECT invasi_perineural FROM patologi_duodenum WHERE dp_duodenum_id_pasien = '$id_pasien'");
              while ($row = mysqli_fetch_array($data_inv)) {
                echo "<option selected value='".$row['invasi_perineural']."'>".$row['invasi_perineural']."</option>";
              }

              $all_inv = ["Negatif", "Positif"];

              for($i=0; $i<count($all_inv); $i++) {
                if($all_inv[$i] != $invasi_perineural) {
                  echo "<option value='".$all_inv[$i]."'>".$all_inv[$i]."</option>";
                }
              }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Catatan Temuan Operasi</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Catatan Temuan Operasi..." name="catatan_temuan_operasi" value="<?php echo $catatan_temuan_operasi; ?>">
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