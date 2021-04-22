<?php
    include "koneksi.php";
    $sql = mysqli_query($konek, "select * from tmprfid");
    $data = mysqli_fetch_array($sql);

    //baca no kartu
    $nokartu = $data['nokartu'];
?>

<div class="form-group">
    <label style="font-size: 20px; margin-left: 0.2rem;"> No.Kartu</label>
    <input type="text" name="nokartu" id="nokartu" placeholder="Tempelkan Kartu RFID anda" class="form-control" style="width:500px" value="<?php echo $nokartu; ?>">
</div>