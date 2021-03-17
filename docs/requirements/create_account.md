# Requirements (Kebutuhan)
## User Requirement: **Create new account (membuat akun)**

## User stories 1
* As a potential web user (Sebagai seorang pengguna web potensial)
* I want to create a new account (Saya ingin membuat akun baru)
* So that I can use all the features (Sehingga saya bisa menggunakan semua fitur yang ditawarkan)

## User stories 2
* As a potential web user (Sebagai seorang pengguna mobile potensial)
* I want to create a new account (Saya ingin membuat akun baru)
* So that I can use all the features (Sehingga saya bisa menggunakan semua fitur yang ditawarkan)

## Workflow
![Sign Up Workflow](/images/sign_up.svg)

## Wireframe
![Sign Up Workflow](/images/sign_up_wireframe.svg)

## Details of Requirements (Rincian kebutuhan)
<table>
    <thead>
        <tr>
            <th>Input</th>
            <th>Requirements</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan=2>Email</td>
            <td>Required (wajib diisi)</td>
        </tr>
        <tr>
            <td>Valid email (format email)</td>
        </tr>
        <tr>
            <td rowspan=3>Password</td>
            <td>Required (wajib diisi)</td>
        </tr>
        <tr>
            <td>Min. 6 character length (minimum panjang 6 karakter)</td>
        </tr>
            <td>Contains at least 1 capital or numeric letter (minimal mengandung 1 karakter huruf kapital atau angka)</td>
                <tr>
            <td rowspan=2>Button: Sign Up</td>
            <td>Go to dashboard page (menuju page dashboard)</td>
        </tr>
    </tbody>
</table>

## User Acceptance Test (UAT) - Kondisi Ideal
* (Given) I am on Sign Up page (saya sedang di halaman pendaftaran)
* (When) I fill valid email form AND I fill valid password form (saya mengisi form email dan password yang valid)
* (Then) New user successfully created AND successful message dispalayed AND I received registration confirmation email (user baru berhasil dibuat DAN muncul pesan sukses di layar DAN saya menerima email konfirmasi pendaftaran)

## User Acceptance Test (UAT) - Jika Email atau Password tidak sesuai
* (Given) I am on Sign Up page (saya sedang di halaman pendaftaran)
* (When) I fill invalid email form OR I fill invalid password form (saya mengisi form email dan password yang tidak valid)
* (Then) Warning alert message appeared (pesan peringatan untuk meminta mengisi email atau password yang valid)
