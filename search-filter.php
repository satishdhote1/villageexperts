<?php
require("config.php");
$q = $_GET['q'];
$qry_get_specl=mysqli_query($bd, "SELECT * FROM specialisation WHERE ParentID='$q'");
while($mem_get_specl=mysqli_fetch_assoc($qry_get_specl)){			
	//echo ", ".$mem_get_specl['Specialisation'];
	?>
    <div class="imanigition_box">
  <div class="check_box"><input name="spelization[]" type="checkbox" value="<?php echo $mem_get_specl['SpecialisationID']; ?>"></div>
  <span class="check_text"><?php echo $mem_get_specl['Specialisation']; ?></span>
  </div>
    <?php
}

?>
