from Gadget import Gadget

# daftar barang (list of object)
daftar = []

def cariIndexById(id):
    for i, g in enumerate(daftar):
        if g.getId() == id:
            return i
    return -1

def tampilkanData():
    if not daftar:
        print("\nBelum ada data.\n")
        return

    print("\n=== Daftar Gadget ===")
    print(f"{'ID':<5}{'Nama':<20}{'Harga':<12}{'Merk':<15}"
          f"{'Garansi':<10}{'Jenis':<10}{'OS':<10}{'RAM':<8}{'Storage':<10}")
    print("-" * 100)

    for g in daftar:
        print(f"{g.getId():<5}{g.getNama():<20}{g.getHarga():<12}"
              f"{g.getMerk():<15}{g.getGaransi():<10}{g.getJenis():<10}"
              f"{g.getOS():<10}{str(g.getRam())+'GB':<8}{str(g.getStorage())+'GB':<10}")
    print()

def tambahData():
    try:
        id = int(input("Masukkan ID: "))
        if cariIndexById(id) != -1:
            print("ID sudah digunakan!")
            return
        nama = input("Masukkan Nama: ")
        harga = int(input("Masukkan Harga: "))
        merk = input("Masukkan Merk: ")
        garansi = int(input("Masukkan Garansi (bulan): "))
        jenis = input("Masukkan Jenis (HP/Laptop): ")
        os = input("Masukkan OS: ")
        ram = int(input("Masukkan RAM (GB): "))
        storage = int(input("Masukkan Storage (GB): "))

        g = Gadget(id, nama, harga, merk, garansi, jenis, os, ram, storage)
        daftar.append(g)
        print("Data berhasil ditambahkan!")
    except ValueError:
        print("Input tidak valid!")

def main():
    # data awal
    daftar.extend([
        Gadget(1, "iPhone 16 Pro Max", 24000000, "Apple", 12, "HP", "iOS", 12, 256),
        Gadget(2, "iPhone 15", 20000000, "Apple", 12, "HP", "iOS", 8, 128),
        Gadget(3, "Xiaomi Book S", 9000000, "Xiaomi", 18, "Laptop", "Windows", 8, 512),
        Gadget(4, "Pixelbook", 13000000, "Google", 24, "Laptop", "ChromeOS", 16, 256),
        Gadget(5, "Oppo Pad", 12000000, "Oppo", 18, "Tablet", "Android", 8, 256),
    ])

    while True:
        print("=== MENU TOKO ELEKTRONIK ===")
        print("1. Tampilkan Data")
        print("2. Tambah Data")
        print("0. Keluar")
        pilihan = input("Pilih menu: ")

        if pilihan == "1":
            tampilkanData()
        elif pilihan == "2":
            tambahData()
        elif pilihan == "0":
            print("Program selesai.")
            break
        else:
            print("Pilihan tidak valid.")

if __name__ == "__main__":
    main()
