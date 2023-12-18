<?php
// right code for join with three tables


$bussall = "SELECT * FROM business INNER JOIN users ON business.business_owner_id=users.id INNER JOIN address ON address.id=business.addressid WHERE business.id=$businessid";
     $address_data = $this->CommonController->SelectRawquery($bussall,'resultArray');
?>