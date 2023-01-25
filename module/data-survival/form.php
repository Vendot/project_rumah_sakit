<?php

    include_once("module/pasien/profile-pasien.php");

    $id_pasien = isset($_GET['id_pasien']) ? $_GET['id_pasien'] : 'id not found';
    $type_ill = isset($_GET['type_ill']) ? $_GET['type_ill'] : 'type ill not found';
    $id_klinis_esofagus = isset($_GET['id_klinis_esofagus']) ? $_GET['id_klinis_esofagus'] : false;
    $id_klinis = isset($_GET['id_klinis']) ? $_GET['id_klinis'] : false;
    $id_patologi = isset($_GET['id_patologi']) ? $_GET['id_patologi'] : false;
    $id_data_terapi = isset($_GET['id_data_terapi']) ? $_GET['id_data_terapi'] : false;
    $id_data_survival = isset($_GET['id_data_survival']) ? $_GET['id_data_survival'] : false;
    
    $ds_status = "";
    $tanggal_meninggal = "";
    $tanggal_rekurensi = "";
    $masa_hidup = "";
    $button = "Save";

    if($id_data_survival) {

        if($id_data_survival) {
        $query_id = mysqli_query($conn, "SELECT * FROM data_survival WHERE id_data_survival='$id_data_survival'");
        $row = mysqli_fetch_assoc($query_id);
        }

        $ds_status = $row['ds_status'];
        $tanggal_meninggal = $row['tanggal_meninggal'];
        $tanggal_rekurensi = $row['tanggal_rekurensi'];
        $masa_hidup = $row['masa_hidup'];
        $button = "Update";
        }

?>

<div class="container-content">
    <div class="containerTab" style="background:white">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <h2>Survival </h2>

        <form action="
                <?php

                if($id_klinis && $id_patologi && $id_data_terapi && $id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_patologi && $id_data_terapi) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi";
                } 
                else if($id_klinis && $id_patologi && $id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                }
                else if($id_patologi && $id_data_terapi && $id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi&id_data_survival=$id_data_survival";
                }
                else if($id_klinis && $id_data_terapi && $id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_data_terapi=$id_data_terapi&id_data_survival=$id_data_survival";
                }
                else if($id_klinis && $id_patologi) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_patologi=$id_patologi";
                } 
                else if($id_klinis && $id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_data_survival=$id_data_survival";
                } 
                else if($id_klinis && $id_data_terapi) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis&id_data_terapi=$id_data_terapi";
                } 
                else if($id_patologi && $id_data_terapi) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi&id_data_terapi=$id_data_terapi";
                } 
                else if($id_patologi && $id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi&id_data_survival=$id_data_survival";
                } 
                else if($id_data_terapi && $id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi&id_data_survival=$id_data_survival";
                }
                else if($id_klinis) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_klinis=$id_klinis";
                } 
                else if($id_patologi) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_patologi=$id_patologi";
                } 
                else if($id_data_terapi) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_terapi=$id_data_terapi";
                } 
                else if($id_data_survival) {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien&id_data_survival=$id_data_survival";
                }
                else {
                    echo BASE_URL."module/data-survival/action.php?type_ill=$type_ill&id_pasien=$id_pasien";
                }
                ?>
            " method="POST">
        </br>
            <div class="form-group row">
                <label for="inputState" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-control" name="ds_status" value="<?php echo $ds_status; ?>" >
                    <?php
                
                        $data_alv = mysqli_query($conn, "SELECT ds_status FROM data_survival WHERE ds_id_pasien = '$id_pasien'");
                        while ($row = mysqli_fetch_array($data_alv)) {
                            echo "<option selected value='".$row['ds_status']."'>".$row['ds_status']."</option>";
                        }

                        $all_alv = ['Hidup', 'Meninggal'];
                        for($i=0; $i<count($all_alv); $i++) {
                            if($all_alv[$i] != $ds_status) {
                                echo "<option value='".$all_alv[$i]."'>".$all_alv[$i]."</option>";
                            }
                        }

                    ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Meninggal</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="inputPassword3" name="tanggal_meninggal" value="<?php echo $tanggal_meninggal; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Rekurensi</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="inputPassword3" name="tanggal_rekurensi" value="<?php echo $tanggal_rekurensi; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Masa Hidup</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Masa Hidup" name="masa_hidup" readonly value="<?php echo $masa_hidup; ?>" >
                </div>
            </div>
            <?php
                $datas = mysqli_query($conn, "SELECT * FROM data_pasien WHERE id_pasien = '$id_pasien'");
                while($dta = mysqli_fetch_assoc($datas)) {
                    $namaLengkap = $dta['nama_lengkap'];
                    $tanggal_lahir = $dta['date_born'];
                }
                // $tanggal_lahir = $tanggal_lahir;
                // echo $tanggal_lahir;
                // echo $tanggal_meninggal;
                // $var = $tanggal_meninggal->diff($tanggal_lahir);
                // echo $var->d;

                $tanggal_meninggal = date_create($tanggal_meninggal);
                $tanggal_lahir = date_create($tanggal_lahir);
                $diff = date_diff($tanggal_meninggal, $tanggal_lahir);

                $variabel_hari = $diff->d;
                $variabel_bulan = $diff->m*30;
                $variabel_tahun = $diff->y*365;

                $variabel_total = $variabel_hari + $variabel_bulan + $variabel_tahun;
                // echo $variabel_total;
                
            ?>

            <div class="form-group row">
                <div class="col-sm-10">
                <input type="submit" name="button" class="btn btn-primary" value="<?php echo $button; ?>"/>
                </div>
            </div>
        </form>
    </div>
</div>