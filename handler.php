<?php
/*
 OpenSimulator Web Login
    Copyright (C) 2019 Neverworld Grid and its Contributors

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/
// Report all errors
error_reporting(E_ALL);
require"config.php";

$return = $_POST["return"];
$last_name = $_POST["last"];
$first_name = $_POST["first"];
$password = $_POST["password"];
$remember = $_POST["remember"];

/**
  * Returns a OpenSim UUID based on the Provided First and Last Name
  * This Queries your Database to get the UUID of the User Logging In
  * @param string $first The First Name of the User
  * @param string $last The Last Name of the User
  * @param object $db The Database Object Connected to the ROBUST DB
  * @return string $uuid The UUID of your person
  */
function get_uuid_by_user($first, $last, $db){

$sql = "SELECT `PrincipalID` FROM `useraccounts` WHERE `FirstName` = '" . $first ."' AND `LastName` = '" . $last . "' LIMIT 1";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $uuid = $row["PrincipalID"];
    }
} else {
   die();
}
return $uuid;
}

/**
  * Retrieves the Hash from the ROBUST AUTH Table
  * @param string $uuid The UUID of your User
  * @param object $db DB Object of your ROBUST Instance
  * @return string $hash The UUID of your person
  */

function get_hash_by_uuid($uuid, $db){
$sql = "SELECT `passwordHash` FROM `auth` WHERE `UUID` = '" . $uuid . "' LIMIT 1";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $hash = $row["passwordHash"];
    }
} else {
   die();
}
return $hash;
}

/**
  * Retrieves the Salt from the ROBUST AUTH Table
  * @param string $uuid The UUID of your User
  * @param object $db DB Object of your ROBUST Instance
  * @return string $salt The SALT of your person
  */
function get_salt_by_uuid($uuid, $db){
$sql = "SELECT `passwordSalt` FROM `auth` WHERE `UUID` = '" . $uuid . "' LIMIT 1";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $salt = $row["passwordSalt"];
    }
} else {
   die();
}
return $salt;
}


/**
  * Attemps to See if your so called person is correct in their auth
  * @param string $salt The Salt
  * @param string $hash Hash
  * @param string $pass the password submitted
  * @return bool $correct TRUE/False if all documents are in order
  */
function check_my_id($salt, $hash, $pass){
$p = md5($pass);
$attempt = md5($p.":".$salt);

//$a2 = md5($attempt);





if($attempt == $hash)
{
return TRUE;
}
else{
return FALSE;
}



}


/// get to work

$uuid = get_uuid_by_user($first_name, $last_name, $conn);


// echo "Hash : " . get_hash_by_uuid($uuid, $conn) . "  |  Salt : " . get_salt_by_uuid($uuid, $conn);

$r_hash = get_hash_by_uuid($uuid, $conn);
$r_salt = get_salt_by_uuid($uuid, $conn);

$validity =  check_my_id($r_salt, $r_hash, $password);


echo $validity;


