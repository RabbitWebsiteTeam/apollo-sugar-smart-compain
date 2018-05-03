<?php

$contactnumber="9966495264";
$randomnumber="4512";
$homepage = file_get_contents("http://bhashsms.com/api/sendmsg.php?user=godad738&pass=AP35k2533&sender=SNCHAP&phone=".$contactnumber."&text=One%20Time%20Password%20is%20".$randomnumber."%20.%20Kindly%20use%20this%20to%20complete%20your%20registration&priority=ndnd&stype=normal");

?>