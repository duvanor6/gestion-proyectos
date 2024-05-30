<div class="resultsValid">
  <p><b>Name: </b><?php echo $names; ?></p>
  <p><b>Surname: </b><?php echo $surnames; ?></p>
  <p><b>Username: </b><?php echo $username; ?></p>
  <p><b>Password: </b><?php echo $pass; ?></p>
  <p><b>Address: </b><?php echo $address; ?></p>
  <p><b>Phone: </b><?php echo $phone; ?></p>
  <p><b>Gender: </b><?php echo $gender; ?></p>
  <p><b>Birthdate: </b><?php echo $birthdate; ?></p>
  <p><b>Profession: </b><?php echo $profession; ?></p>
</div>

<div style="display:none;">
  <input type="text" name="names" value="<?php echo $names; ?>">
  <input type="text" name="surnames" value="<?php echo $surnames; ?>">
  <input type="text" name="username" value="<?php echo $username; ?>">
  <input type="text" name="pass" value="<?php echo $pass; ?>">
  <input type="text" name="address" value="<?php echo $address; ?>">
  <input type="text" name="phone" value="<?php echo $phone; ?>">
  <input type="text" name="gender" value="<?php echo $gender; ?>">
  <input type="text" name="birthdate" value="<?php echo $birthdate; ?>">
  <input type="text" name="profession" value="<?php echo $profession; ?>">
  <input type="hidden" name="checkAccess" value="TRUE">
</div>
