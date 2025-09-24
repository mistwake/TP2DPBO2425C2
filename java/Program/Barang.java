public class Barang {
    private int id;
    private String nama;
    private int harga;

    public Barang() {
    }

    public Barang(int id, String nama, int harga) {
        this.id = id;
        this.nama = nama;
        this.harga = harga;
    }

    // setter
    public void setId(int id) {
        this.id = id;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public void setHarga(int harga) {
        this.harga = harga;
    }

    // getter
    public int getId() {
        return id;
    }

    public String getNama() {
        return nama;
    }

    public int getHarga() {
        return harga;
    }
}
