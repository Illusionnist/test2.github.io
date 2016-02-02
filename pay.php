<!DOCTYPE HTML>
<html>
<head>
<title>pay.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php

/* Set oracle user login and password info */
$dbuser = "prashast"; /* your deakin login */
$dbpass = "prashast"; /* your oracle access password */
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);

if (!$connect) {
echo "An error occurred connecting to the database";
exit;
}

$query="INSERT INTO BOOK (FNAME, LNAME, EMAIL, PNUM, COUNTRYD , COUNTRYA, PT,  CT, CNAME, ED, CVC)
VALUES
('$_REQUEST[first]','$_REQUEST[last]','$_REQUEST[Email]', '$_REQUEST[Contact]', '$_REQUEST[countryD]', $_REQUEST[countryA], '$_REQUEST[ptype]',$_REQUEST[cardtype], '$_REQUEST[Ncard]', $_REQUEST[Cnumber], '$_REQUEST[Xdate]', '$_REQUEST[CVC]')";

// Add the data to the database as a new record
$stmt = OCIParse($connect, $query);
if(!$stmt) {
echo "An error occurred in parsing the sql string.\n";
exit;
}

OCIExecute($stmt);
echo "Your payment has been received";

echo ("<p> You have paid with ". $_REQUEST[cardtype]." please take a screen shot of this page.</p>");


OCILogOff($connect);
?>

</body>
</html>