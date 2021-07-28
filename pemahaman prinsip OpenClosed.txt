 	

<?php

interface PayableInterface
{
    public function pay();
}

class CreditCardPayment implements PayableInterface
{
    public function pay()
    {
        return [
            '1'=>'Masukkan nomor kartu kredit',
            '2'=>'Masukkan kode CVT',
            '3'=>'Masukkan nama pemegang kartu'
        ];
    }
}

class PaypalPayment implements PayableInterface
{
    public function pay()
    {
        return [
            '1'=>'Masukkan username dan password',
            '2'=>'Masukkan kode transaksi'        ];
    }
}

class ATMTransferPayment implements PayableInterface
{
    public function pay()
    {
        return [
            '1'=>'Masukkan kartu ATM',
            '2'=>'Masukkan 6 digit PIN',
            '3'=>'Pilih menu transaksi',
            '4'=>'Pilih nomor rekening virtual',
            '5'=>'Masukkan kode transaksi'
        ];
    }
}

class PaymentFactory
{
    public function initializePayment($type)
    {
        if ($type === 'credit') {
            return new CreditCardPayment();
        }
        if ($type == 'paypal') {
            return new PaypalPayment();
        }
        if ($type === 'atm') {
            return new ATMTransferPayment();
        }

        throw new Exception("Unsupported payment method");
    }
}

$jenis = 'credit';
$paymentFactory = new PaymentFactory();
$payment = $paymentFactory->initializePayment($jenis);
print_r($payment->pay());



Prinsip Open/Closed yaitu sebuah class yang dirancang untuk sebuah entitas yang dapat di modifikasi sifatnya. prinsip ini di rancang untuk dimodifikasi di tambahkan tidak berlaku jika dengan mengubah sesuatu didalamnya.
yang terjadi jika kita menambahkan sebuah class-class baru yang mengimplements interface? dan bagaimana cara memanggil tiap class-class tersebut, karrna Interface adalah sekumpulan dari method-method yang dibuat, namun belum ada operasi di dalam tubuh method tersebut.
Jika kita menambahkan sebuah class class baru yang mengimplementasikan interface  maka Interface akan membuat si objek  bisa menggunakan objek apapun, dengan syarat objek tersebut harus mengimplementasikan method dari interface
Cara memanggil tiap class
1.    interface MyInterface
2.    public abstract class Entitas
3.    public class Mahasiswa extends Entitas implements MyInterface