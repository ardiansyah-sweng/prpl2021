# Requirements (Kebutuhan)
## User Requirement: **Sign In (masuk ke sistem)**

## User stories 1
* As a registered web user (Sebagai seorang pengguna web terdaftar)
* I want to sign in to the apps using my account (Saya ingin masuk menggunakan akun saya)
* So that I can use all the features (Sehingga saya bisa menggunakan semua fitur yang ditawarkan)

## User stories 2
* As a registered mobile user (Sebagai seorang pengguna mobile terdaftar)
* I want to sign in to the apps using my account (Saya ingin masuk menggunakan akun saya)
* So that I can use all the features (Sehingga saya bisa menggunakan semua fitur yang ditawarkan)

## Workflow
![Sign Up Workflow](/images/sign_in_workflow.svg)

## Wireframe
![Sign Up Workflow](/images/sign_in_wireframe.svg)

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
* (Given) I am on Landing Page (saya sedang di Landing Page)
* (When) I fill valid email form AND I fill valid password form (saya mengisi form email dan password yang valid)
* (Then) Dashboard page appear (muncul halaman Dashboard)

## User Acceptance Test (UAT) - Jika Email atau Password tidak sesuai
* (Given) I am on Landing Page (saya sedang di Landing Page)
* (When) I fill invalid email form OR I fill invalid password form (saya mengisi form email dan password yang tidak valid)
* (Then) Warning alert message appeared (pesan peringatan untuk meminta mengisi email atau password yang valid)
