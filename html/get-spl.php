<?php
	session_start();
require("config.php");
$q=$_GET['q'];
?>
<div class="provider_fild_box"><select name="spelisation" class="provider_fild_box_main" id="spelisation" required>
  <option value="">Select Spelisation</option>
  <?php
  $qrySpl=mysqli_query($bd, "SELECT * FROM specialisation WHERE ParentID='$q'");
  while($memSpl=mysqli_fetch_assoc($qrySpl)) {
  ?>
  <option value="<?php echo $memSpl['SpecialisationID']; ?>"><?php echo $memSpl['Specialisation']; ?></option>
  <?php
  }
  ?>
  </select></div>
