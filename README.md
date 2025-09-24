# TP2

## JANJI
Saya Anas Miftakhul Falah dengan 2410865 mengerjakan tugas praktikum 2
dalam mata kuliah DPBO untuk keberkahan-Nya maka saya
tidak akan melakukan kecurangan seperti yang telah di spesifikasikan Aamiin.

## DESIGN
- Program ini dibuat untuk manajemen barang elektronik di sebuah toko elektronik.
- Yang dimana program ini dibuat menggunakan 4 bahasa, yaitu C++, Python, Java, PHP.
- Fitur daripada program yaitu Menambahkan data dan Menampilkan data.

<img width="141" height="1101" alt="diagram" src="https://github.com/user-attachments/assets/e5046377-e689-40c4-a67f-6f9dd1195550" />

## Penjelasan Class

### 1. **Barang**
- Class dasar yang menyimpan atribut umum semua barang di toko:
  - `id` → kode unik barang
  - `nama` → nama barang
  - `harga` → harga barang
- Class ini bisa digunakan untuk semua barang, tidak hanya elektronik.

### 2. **Elektronik**
- Turunan dari `Barang`, menambahkan atribut khusus barang elektronik:
  - `merk` → merek barang
  - `garansi` → lama garansi (bulan)
- Cocok untuk barang elektronik secara umum, seperti TV, kulkas, laptop.

### 3. **Gadget**
- Turunan dari `Elektronik`, khusus untuk gadget seperti HP, laptop, atau tablet.
- Atribut tambahan:
  - `jenis` → tipe gadget (HP/Laptop/Tablet)
  - `os` → sistem operasi (Android/iOS/Windows)
  - `ram` → kapasitas RAM (GB)
  - `storage` → kapasitas penyimpanan (GB)

## FLOW CODE
1. Mulai Program
   - Inisialisasi array kosong untuk menyimpan data barang nya.
2. Tampilkan menu utama
   - (1)Tampilkan data
   - (2)Tambah data
   - (0)Keluar 
4. User diminta masukkan menu mana yang ingin digunakan
5. Switch case
   - Jika 1 (tampilkan data)
     - melakukan looping sebanyak jumlah barang di array.
     - cetak seluruh data.
   - Jika 2 (tambah data)
     - Input ID
     - Cek apakah ID sudah tersebut sudah digunakan atau belum
       - Jika ada: maka akan menampilkan pesan error.
       - Jika belum: maka lanjut input nama, harga, merk, garansi, jenis, OS, ram, storage.
       - Menambahkan barang baru ke array.
       - Menampilkan pesan sukses.
   - jika 0 (keluar)
     - Tampilkan pesan "program seslesai".

## DOKUMENTASI
  [C++](https://youtu.be/roqXka-M8CU)
  [Python](https://youtu.be/7albYApEieI)
  [Java](https://youtu.be/KLG1uiMVugc)
  [PHP](https://youtu.be/o-ByUP5262Q)
      
