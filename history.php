<?php 

include ('functions.php');

$obj = new SignUp_Login;
$con = $obj -> connect();

date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();

$end = $date->format('Y-m-d h:i:s');
$date->modify('-7 days');
$start = $date->format('Y-m-d h:i:s');




$dtr = "SELECT * FROM log_history WHERE login_time between '$start' AND '$end' ";
$query = mysqli_query($con,$dtr);

?>

<label><b>History 7 hari kebelakang</b></label><br>
<label><?= 'Dari tanggal '.$start.' ke tanggal '.$end  ?></label><br><br>

 <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>User id</th>
            <th>Email</th>
            <th>login history</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
        
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data["id"]; ?></td>
            <td><?php echo $data["user_id"];?></td>
            <td><?php echo $data["email"];?></td>
            <td><?php echo $data["login_time"];?></td>
           		
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
    <br>

<a href="index.php">Go back</a>