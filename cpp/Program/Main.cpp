#include <iostream>
#include <iomanip>
#include "Gadget.cpp"
using namespace std;

Gadget daftar[100];
int jumlahBarang = 0;

int cariIndexById(int id)
{
    for (int i = 0; i < jumlahBarang; i++)
    {
        if (daftar[i].getId() == id)
        {
            return i;
        }
    }
    return -1;
}

void tampilkanData()
{
    if (jumlahBarang == 0)
    {
        cout << "\nBelum ada data.\n\n";
        return;
    }

    size_t wNama = 4, wMerk = 4, wJenis = 5, wOS = 2; // minimal panjang header
    // cari lebar kolom maksimal
    for (int i = 0; i < jumlahBarang; i++)
    {
        wNama = max(wNama, daftar[i].getNama().size());
        wMerk = max(wMerk, daftar[i].getMerk().size());
        wJenis = max(wJenis, daftar[i].getJenis().size());
        wOS = max(wOS, daftar[i].getOS().size());
    }
    wNama += 2;
    wMerk += 2;
    wJenis += 2;
    wOS += 2;

    // cetak header
    cout << "\n=== Daftar Gadget ===\n";
    cout << left
         << setw(5) << "ID"
         << setw(wNama) << "Nama"
         << setw(12) << "Harga"
         << setw(wMerk) << "Merk"
         << setw(10) << "Garansi"
         << setw(wJenis) << "Jenis"
         << setw(wOS) << "OS"
         << setw(8) << "RAM"
         << setw(10) << "Storage" << endl;

    cout << string(5 + wNama + 12 + wMerk + 10 + wJenis + wOS + 8 + 10, '-') << endl;

    // cetak isi tabel
    for (int i = 0; i < jumlahBarang; i++)
    {
        cout << left
             << setw(5) << daftar[i].getId()
             << setw(wNama) << daftar[i].getNama()
             << setw(12) << daftar[i].getHarga()
             << setw(wMerk) << daftar[i].getMerk()
             << setw(10) << daftar[i].getGaransi()
             << setw(wJenis) << daftar[i].getJenis()
             << setw(wOS) << daftar[i].getOS()
             << setw(8) << (to_string(daftar[i].getRam()) + "GB")
             << setw(10) << (to_string(daftar[i].getStorage()) + "GB")
             << endl;
    }
    cout << endl;
}

void tambahData()
{
    int id, harga, garansi, ram, storage;
    string nama, merk, jenis, os;

    cout << "Masukkan ID: ";
    cin >> id;

    if (cariIndexById(id) != -1)
    {
        cout << "ID sudah digunakan!\n";
        return;
    }

    cin.ignore();
    cout << "Masukkan Nama: ";
    getline(cin, nama);
    cout << "Masukkan Harga: ";
    cin >> harga;
    cin.ignore();
    cout << "Masukkan Merk: ";
    getline(cin, merk);
    cout << "Masukkan Garansi (bulan): ";
    cin >> garansi;
    cin.ignore();
    cout << "Masukkan Jenis (HP/Laptop): ";
    getline(cin, jenis);
    cout << "Masukkan OS: ";
    getline(cin, os);
    cout << "Masukkan RAM (GB): ";
    cin >> ram;
    cout << "Masukkan Storage (GB): ";
    cin >> storage;

    daftar[jumlahBarang] = Gadget(id, nama, harga, merk, garansi, jenis, os, ram, storage);
    jumlahBarang++;

    cout << "Data berhasil ditambahkan!\n";
}

int main()
{
    // 5 data awal
    daftar[jumlahBarang++] = Gadget(1, "Galaxy S24", 15000000, "Samsung", 24, "HP", "Android", 12, 256);
    daftar[jumlahBarang++] = Gadget(2, "iPhone 15", 20000000, "Apple", 12, "HP", "iOS", 8, 128);
    daftar[jumlahBarang++] = Gadget(3, "Xiaomi Book S", 9000000, "Xiaomi", 18, "Laptop", "Windows", 8, 512);
    daftar[jumlahBarang++] = Gadget(4, "Pixelbook", 13000000, "Google", 24, "Laptop", "ChromeOS", 16, 256);
    daftar[jumlahBarang++] = Gadget(5, "Oppo Pad", 12000000, "Oppo", 18, "Tablet", "Android", 8, 256);

    int pilihan;
    do
    {
        cout << "=== MENU TOKO ELEKTRONIK ===\n";
        cout << "1. Tampilkan Data\n";
        cout << "2. Tambah Data\n";
        cout << "0. Keluar\n";
        cout << "Pilih menu: ";
        cin >> pilihan;

        switch (pilihan)
        {
        case 1:
            tampilkanData();
            break;
        case 2:
            tambahData();
            break;
        case 0:
            cout << "Program selesai.\n";
            break;
        default:
            cout << "Pilihan tidak valid.\n";
        }
    } while (pilihan != 0);

    return 0;
}
