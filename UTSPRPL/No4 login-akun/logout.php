<?php 

	// ini adalah proses untuk logout
	session_start();
	session_destroy(); // menghilangkan session yang ada
	
	echo "<script>alert('You have successfully logged out'); window.location = 'index.php'</script>"; // jika sudah logout, maka akan di arahkan ke index.php
