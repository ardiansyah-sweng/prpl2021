<!DOCTYPE html> //adalah suatu deklarasi yang digunakan untuk mengidentifikasi jenis dokumen HTML
<html>
 <head>
  <title>SIG-IN</title> //judul
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <style>
  	body{
	    background-repeat: no-repeat; // menentukan apakah warna/gambar background perlu dilakukan perulangan 
		background-size:cover
	}
	#log{
            background: #009999; // warna untuk background box sign-in 
            border-radius: 6px; // pengaturan untuk membuat bayangan pada elemen 
            box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.65);
            height: 430px; //ukuran tinggi elemen 
            margin: 6rem auto 8.1rem auto; // besar batas pada elemen 
            width: 330px; //ukuran lebar
        }
	#loginn{
         padding: 14px 46px; // pengaturan untuk besar batas bagian dalam sebuah elemen 
    }
	#title {
                font-family: "Raleway Thin", sans-serif;
                letter-spacing: 6px;
                padding-bottom: 22px; // batas bagian dalam dan menentukan besar area sebuah elemen 
                padding-top: 12px; //menambah luas bagian atas elemen 
                text-align: center; // mengatur teks agar berada diposisi tengah
	}
	.linetitle {
                background: -webkit-linear-gradient(right, #6E2C00, #935116); // memberikan warna pada elemen login
                height: 2px;
                margin: -1.1rem auto 0 auto;
                width: 89px;
	}
	a {
                text-decoration: none; // untuk menghilangkan underline pada elemen <a href="">
	}
	label {
                font-family: "Raleway", sans-serif; // Releway adalah jenis font yang digunakan dan sans-serif adalah typeface atau font yang digunakan 
                font-size: 11pt; //berguna mengatur ukuran font
	}
	#forgot-pass {
                color: #6E2C00;
                font-family: "Raleway", sans-serif;
                font-size: 10pt;
                margin-top: 3px;
                text-align: right;
	}
	.form {
                align-items: left;
                display: flex; // berguna untuk menampilkan elemen supaya sebaris dengan elemen sebelumnya
                flex-direction: column;
	}
	.border {
                background: -webkit-linear-gradient(right, #6E2C00, #935116);
                height: 1px;
                width: 100%;
	}
	.form-loginn {
                background: #fbfbfb;
                border: none;
                outline: none;
                padding-top: 14px;
	}
	#signup {
                color: #6E2C00;
                font-family: "Raleway", sans-serif;
                font-size: 10pt;
                margin-top: 16px;
                text-align: center;
	}
	#submit-btn {
                background: -webkit-linear-gradient(right, #00CC00, #66ffCC);
                border: none;
                border-radius: 21px;
                box-shadow: 0px 1px 8px #6E2C00;
                cursor: pointer;
                color: white;
                font-family: "Raleway SemiBold", sans-serif;
                height: 42.3px;
                margin: 0 auto;
                margin-top: 50px;
                transition: 0.25s;
                width: 153px;
	}
	#submit-btn:hover {
                box-shadow: 0px 1px 18px #0099ff;
	}
 </style>
 </head>
 <body><div id="log"><div id="loginn">
    <div id="title"> //mendifinisikan id class title, dan mengelompokkan elemen atau tag-tag menjadi suatu grup
        <h2>SIG-IN</h2>  // membuat judul pada dokumen html
        <form method="post" class="form"> // menampung elemen, post(digunakan untuk mengirim data pada database)
    	<label for="user-email" style="padding-top:13px">&nbsp;Email</label>
        <input  // menginputkan email
            id="user-email" 
            class="form-loginn"
            type="email"
            name="email" 
            autocomplete="on"
            required />
            <div class="border"></div>
            <label for="user-password" style="padding-top:24px">&nbsp;Password</label>
            <input // menginputkan password
            id="user-password"
            class="form-loginn"
            type="Password"
            name="Password"
            required/>
            <div class="border"></div>
            <a href="#"><legend id="forgot-pass">Forgot password?</legend></a>
            <input id="submit-btn" type="submit" name="submit" value="LOGIN" /><a href="#" id="signup">Don't have account yet?</a>
            <input type="button" onclick=" location = ' signup.php ' " name="btnregis" value="SIGNUP" class="requireds"
        </form>
        </div>
    </div>
</body>
</html>