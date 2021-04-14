<?php

    $connect = mysqli_connect("localhost", "root", "", "signup");
    session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>Barbershop</title>
    <style>
      /* navbar */
.navbar{
    position: relative;
    z-index: 1;
}
.navbar-brand{
font-size: 32px;
   }
/* jumbotron */
.jumbotron{
    background-image: url("assets/barber.png");
    background-size: 100%;
    height: 500px;
    text-align: center;
    position: relative;
    background-attachment: fixed;
   }
   
   
   .jumbotron .container{
    position: relative;
    z-index: 1;
   }
   
   
   .jumbotron::after{
    content:'';
    display: block;
    width:100%;
    height:80%;
    background-image: linear-gradient(to top,rgba(0,0,0,1),rgba(0,0,0,0));
    position: absolute;
    bottom: 0;
   }
   
   
   .jumbotron h1{
    color: white;
    margin-top: 150px;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.7);
    font-weight: 200;
    font-size: 40px;
    margin-bottom: 30px;
   }
   
   
   .jumbotron h1 span{
    font-weight: 500;
   }
   
   
   
   /*info panel*/
   .info-panel{
    background-color: white;
    box-shadow: 0 3px 20px rgba(0,0,0,0.5);
    border-radius: 12px;
    padding: 30px;
    margin-top: -100px;
   }
   
   
   .info-panel img{
    width:80px;
    height:80px;
    margin-bottom: 20px;
    margin-right: 20px;
   }
   
   
   .info-panel p{
    font-size: 14px;
    color:#acacacac;
    margin-top: -5px;
   }
   
   
   .info-panel h4{
    font-size: 16px;
    text-transform: uppercase;
    font-weight: bold;
    margin-top:5px;
   }
   
   
   /*deskripsi*/
   .deskripsi{
    margin-top:120px;
    text-align: center;
   }
   
   
   .deskripsi h3{
    font-size:42px;
    font-weight: 200;
    text-transform: uppercase;
    margin-top: 30px;
   }
   
   
   .deskripsi h3 span{
    font-weight: 500;
   }
   
   
   .deskripsi p{
    font-size: 18px;
    color: #acacac;
    font-weight: 200;
    margin: 25px 0;
   }
   
   
   
   
   /* footer */
   .footer{
    margin-top:100px;
   }
   .footer p{
    color: #acacac;
    font-size: 18px;
   }
   
   
   /* utilities*/
   .tombol{
    border-radius:40px;
   }
   
   /* desktop version */
   
  
    </style>
  </head>
  <body>

    <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="home">
  <a class="navbar-brand" href="index.php">
    <img src="assets/logo.png" width="50px" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" id="home">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#service">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Service
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#pelayanan">Pelayanan Tambahan</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#copyright">Copyright</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
      <a class="p-3 text-white" href="">Welcome, <strong><span class="text-dark font-italic"><?php echo $_SESSION['email']; ?></span></strong></a>
      </li>
    </ul>
  </div>
  </nav>
  <!-- jumbotron -->
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
   <h1 class="">Cari potongan  <span>Model?</span><br> pergi ke <span>Amanah Barbershop</span> saja</h1>
   <a href="#service" class="tombol"><button class="btn btn-outline-success">Mulai</button></a>
  </div>
 </div>
 <!-- end jumbotron -->



 <!-- container -->
 <div class="container">
 <!-- info panel -->
 
  <div class="row justify-content-center">
   <div class="col-10 info-panel">
    <div class="row">
     <div class="col-lg">
      <img src="assets/time.png" alt="Pesawat" class="float-left">
      <h4>Waktu Operasional</h4>
      <h3>08.00 - 15.30</h3>
      <p>Waktu Operasional pada amanah barbershop mulai dari jam 8 pagi sampai jam setengah 4 sore
      </p>
     </div>
     <div class="col-lg">
      <img src="assets/money.png" alt="Pesawat" class="float-left">
      <h4>Harga Terjangkau</h4>
      <p>Harga masih terjangkau untuk kalangan Pelajar & Mahasiswa
      </p>
     </div>
     <div class="col-lg">
      <img src="assets/attitude.png" alt="Pesawat" class="float-left">
      <h4>Pelayanan yang memuaskan</h4>
      <p>Pelayanan oleh karyawan kepada pelanggan dinilai sudah memuaskan karena terdapat pijatan kepala yang dapat membuat pelanggan rilex
      </p>
     </div>
    </div>
   </div>
  </div>
 
 <!-- end info panel -->
 

 <!-- deskripsi -->
 
  <div class="row deskripsi" id="service" data-mdb-animation-on-scroll="repeat">
    <h2 class="text-center border-bottom" id="">
      <em>About</em>
      <p></p>
    </h2>
    <div class="row">
      <div class="col-lg">
        <a href="#home">

          <img src="assets/logo-2.png" class="img-fluid">
        </a>
    </div>
    <div class="col-lg">
    <h3>Anda diberikan <span>banyak</span> pilihan <span>Model Rambut</span></h3>
     <p>Amanah Barbershop memberikan banyak pilihan untuk model rambut yang simpel tetapi elegan</p>
     <hr>
    </div>
  </div>
  

    <!-- end deskripsi -->
 
    <!-- Card -->
 <div class="card-deck">
   
   <div class="card" style="width: 18rem;">
    <img src="assets/1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <figure class="text-center">
    <blockquote class="blockquote">
      <p><em>Undercut</em></p>
    </blockquote>
      <p><strong>Rp. 19.<small>999</small></strong></p>
  </figure>
      <p class="card-text"> Model potongan rambut undercut memiliki tampilan berbeda dengan jenis potogan lainnya, yaitu terdapat bagian tipis di pinggir hingga belakangnya. Kemudian pada bagian atas memberi kesan tebal.</p>
    </div>
    </div>
    <div class="card" style="width: 18rem;">
    <img src="assets/sidepart.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <figure class="text-center">
    <blockquote class="blockquote">
      <p><em>Side Part</em></p>
    </blockquote>
      <p><strong>Rp. 15.<small>999</small></strong></p>
  </figure>
      <p class="card-text">  Side Part merupakan jenis potongan rambut dengan cukuran tipis dibagian sampingnya. Sedangkan rambut bagian atasya dibiarkan memanjang, dan kemudian ditata dengan belahan yang menyamping.</p>
    </div>
    </div>
    <div class="card" style="width: 18rem;">
    <img src="assets/taperfade.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <figure class="text-center">
    <blockquote class="blockquote">
      <p><em>Taper Fade</em></p>
    </blockquote>
      <p><strong>Rp. 23.<small>999</small></strong></p>
  </figure>
      <p class="card-text"> Taper fade adalah salah satu variasi undercut yang cukup populer di antara para pria.</p>
    </div>
    </div>
 </div>
 <p></p>
 <div class="card-deck">
   
   <div class="card" style="width: 18rem;">
    <img src="assets/frenchcrop.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <figure class="text-center">
    <blockquote class="blockquote">
      <p><em>French Crop</em></p>
    </blockquote>
      <p><strong>Rp. 32.<small>999</small></strong></p>
  </figure>
      <p class="card-text">Gaya klasik French Crop menekankan pada rambut pendek dengan sisi samping dan belakang yang tipis, namun rambut di atas panjang.</p>
    </div>
    </div>
    <div class="card" style="width: 18rem;">
    <img src="assets/bowlcut.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <figure class="text-center">
    <blockquote class="blockquote">
      <p><em>Bowl Cut</em></p>
    </blockquote>
      <p><strong>Rp. 17.<small>999</small></strong></p>
  </figure>
      <p class="card-text">Potongan mangkuk, atau potongan jamur, adalah potongan rambut sederhana di mana rambut depan dipotong dengan pinggiran lurus dan sisa rambut dibiarkan lebih panjang.</p>
    </div>
    </div>
    <div class="card" style="width: 18rem;">
    <img src="assets/Pompadour.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <figure class="text-center">
    <blockquote class="blockquote">
      <p><em>Pompadour</em></p>
    </blockquote>
      <p><strong>Rp. 35.<small>999</small></strong></p>
  </figure>
      <p class="card-text">Pompadour adalah gaya rambut yang dinamai Madame de Pompadour, nyonya Raja Louis XV dari Perancis. Meskipun ada banyak variasi gaya untuk pria, wanita, dan anak-anak.</p>
    </div>
    </div>
 </div>
    <!-- card -->
    <p></p>
    <h2 class="text-center border-bottom" id="pelayanan">
      <em>Pelayanan Tambahan</em>
      <p></p>
    </h2>
 <div class="card-deck">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">CUCI RAMBUT</h5>
        <h6 class="card-subtitle mb-2 text-muted"> <p><strong>Rp. 14.<small>999</small></strong></p></h6>
        <p class="card-text">Perawatan cuci rambut kebanyakan dilakukan dengan menggunakan krim. Namun bukan sembarang krim, melainkan krim yang berasal dari bahan yang mengandung nutrisi penting untuk rambut dan kesehatan kepala.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">STYLING POMADE</h5>
        <h6 class="card-subtitle mb-2 text-muted"> <p><strong>Rp. 14.<small>999</small></strong></p></h6>
        <p class="card-text">Membentuk gaya rambut High Rise Tipe hybrid yang merupakan campuran antara base pomade dan wax.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">SHAVING</h5>
        <h6 class="card-subtitle mb-2 text-muted"> <p><strong>Rp. 19.<small>999</small></strong></p></h6>
        <p class="card-text">Shaving adalah metode menghilangkan bulu dengan alat cukur.</p>
      </div>
    </div>
  </div>
  <p></p>
  <div class="card-deck">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">GARIS</h5>
        <h6 class="card-subtitle mb-2 text-muted"> <p><strong>Rp. 4.<small>999 /garis</small></strong></p></h6>
        <p class="card-text">Model Skin atau Garis dilakukan dengan cara mencukur bagian kepala yang ingin dibuatkan garis. Setelah lokasinya ditetapkan, rambut dicukur hingga terlihat kulit kepala.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">COLOURING / SEMIR</h5>
        <h6 class="card-subtitle mb-2 text-muted"> <p><strong>Rp. 69.<small>999</small></strong></p></h6>
        <p class="card-text">Pewarnaan rambut atau pengecatan rambut adalah sebuah praktik mengubah warna rambut.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">HAIRTATOO</h5>
        <h6 class="card-subtitle mb-2 text-muted"> <p><strong>Rp. 69.<small>999</small></strong></p></h6>
        <p class="card-text">Tato rambut, pigmentasi mikro kulit kepala, adalah tato kosmetik medis, non-bedah, yang memberikan ilusi gaya rambut potongan rambut pendek pada kepala botak atau menambah kerapatan pada garis rambut yang menipis.</p>
      </div>
    </div>
  </div>
  <!-- end card -->
 <!-- footer -->
  <div class="row footer">
   <div class="col text-center text-capitalize" id="copyright">
    <p>&copy;2020 all rights reserved by Ajibon. </p>
   </div>
  </div>
 <!-- end footer -->
 </div>
 <!-- end container -->

          <!-- <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsive Design</h4>
                        <p class="text-muted">Desain Web Responsif adalah sebuah metode atau pendekatan sistem web desain yang bertujuan memberikan pengalaman berselancar yang optimal dalam berbagai perangkat, baik mobile maupun komputer meja.</p>
                    </div>
                    <div class="col-md-4">
                       
                    </div>
                </div>
            </div>
        </section> -->
        
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>