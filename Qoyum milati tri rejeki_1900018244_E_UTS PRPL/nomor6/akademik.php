create table mahasiswa(
    npm varchar(8) not null,
    nama varchar(45) not null,
    kelas varchar(5) not null,
    tanggalLahir date not null,
    primary key (npm)
) Engine=InnoDB;