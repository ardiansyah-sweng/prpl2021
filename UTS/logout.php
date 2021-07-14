<?php 

	// ini adalah proses untuk logout
	session_start();
	session_destroy(); // menghilangkan session yang ada
	
	echo "<script>alert('Berhasil logout'); window.location = 'sign-in.php'</script>"; // jika sudah logout, maka akan di arahkan ke login.php

?>