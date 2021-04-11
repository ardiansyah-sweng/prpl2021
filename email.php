<?php
// the message
$msg = "test kirim email localhost";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
$result = mail("rizkohopkins@gmail.com","My subject",$msg);
if($result == true){
    print "sudah terkirim";
}
else{
    print "gagal";
}
?>