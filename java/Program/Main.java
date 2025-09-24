import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Main {
    static List<Gadget> daftar = new ArrayList<>();

    static int cariIndexById(int id) {
        for (int i = 0; i < daftar.size(); i++) {
            if (daftar.get(i).getId() == id) {
                return i;
            }
        }
        return -1;
    }

    static void tampilkanData() {
        if (daftar.isEmpty()) {
            System.out.println("\nBelum ada data.\n");
            return;
        }

        // Hitung lebar kolom dinamis
        int wNama = 4, wMerk = 4, wJenis = 5, wOS = 2;
        for (Gadget g : daftar) {
            wNama = Math.max(wNama, g.getNama().length());
            wMerk = Math.max(wMerk, g.getMerk().length());
            wJenis = Math.max(wJenis, g.getJenis().length());
            wOS = Math.max(wOS, g.getOS().length());
        }
        wNama += 2;
        wMerk += 2;
        wJenis += 2;
        wOS += 2;

        System.out.println("\n=== Daftar Gadget ===");
        System.out.printf("%-5s%-" + wNama + "s%-12s%-" + wMerk + "s%-10s%-" + wJenis + "s%-" + wOS + "s%-8s%-10s\n",
                "ID", "Nama", "Harga", "Merk", "Garansi", "Jenis", "OS", "RAM", "Storage");

        // garis
        int totalWidth = 5 + wNama + 12 + wMerk + 10 + wJenis + wOS + 8 + 10;
        System.out.println("-".repeat(totalWidth));

        for (Gadget g : daftar) {
            System.out.printf(
                    "%-5d%-" + wNama + "s%-12d%-" + wMerk + "s%-10d%-" + wJenis + "s%-" + wOS + "s%-8s%-10s\n",
                    g.getId(), g.getNama(), g.getHarga(), g.getMerk(), g.getGaransi(),
                    g.getJenis(), g.getOS(), g.getRam() + "GB", g.getStorage() + "GB");
        }
        System.out.println();
    }

    static void tambahData(Scanner sc) {
        System.out.print("Masukkan ID: ");
        int id = sc.nextInt();
        sc.nextLine();

        if (cariIndexById(id) != -1) {
            System.out.println("ID sudah digunakan!");
            return;
        }

        System.out.print("Masukkan Nama: ");
        String nama = sc.nextLine();
        System.out.print("Masukkan Harga: ");
        int harga = sc.nextInt();
        sc.nextLine();
        System.out.print("Masukkan Merk: ");
        String merk = sc.nextLine();
        System.out.print("Masukkan Garansi (bulan): ");
        int garansi = sc.nextInt();
        sc.nextLine();
        System.out.print("Masukkan Jenis (HP/Laptop): ");
        String jenis = sc.nextLine();
        System.out.print("Masukkan OS: ");
        String os = sc.nextLine();
        System.out.print("Masukkan RAM (GB): ");
        int ram = sc.nextInt();
        System.out.print("Masukkan Storage (GB): ");
        int storage = sc.nextInt();

        daftar.add(new Gadget(id, nama, harga, merk, garansi, jenis, os, ram, storage));
        System.out.println("Data berhasil ditambahkan!");
    }

    public static void main(String[] args) {
        // 5 data awal
        daftar.add(new Gadget(1, "Galaxy S24", 15000000, "Samsung", 24, "HP", "Android", 12, 256));
        daftar.add(new Gadget(2, "iPhone 15", 20000000, "Apple", 12, "HP", "iOS", 8, 128));
        daftar.add(new Gadget(3, "Xiaomi Book S", 9000000, "Xiaomi", 18, "Laptop", "Windows", 8, 512));
        daftar.add(new Gadget(4, "Pixelbook", 13000000, "Google", 24, "Laptop", "ChromeOS", 16, 256));
        daftar.add(new Gadget(5, "Oppo Pad", 12000000, "Oppo", 18, "Tablet", "Android", 8, 256));

        Scanner sc = new Scanner(System.in);
        int pilihan;
        do {
            System.out.println("=== MENU TOKO ELEKTRONIK ===");
            System.out.println("1. Tampilkan Data");
            System.out.println("2. Tambah Data");
            System.out.println("0. Keluar");
            System.out.print("Pilih menu: ");
            pilihan = sc.nextInt();
            sc.nextLine();

            switch (pilihan) {
                case 1 -> tampilkanData();
                case 2 -> tambahData(sc);
                case 0 -> System.out.println("Program selesai.");
                default -> System.out.println("Pilihan tidak valid.");
            }
        } while (pilihan != 0);

        sc.close();
    }
}
