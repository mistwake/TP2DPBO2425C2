public class Gadget extends Elektronik {
    private String jenis;  // HP/Laptop/Tablet
    private String os;
    private int ram;       // GB
    private int storage;   // GB

    public Gadget() {
    }

    public Gadget(int id, String nama, int harga,
                  String merk, int garansi,
                  String jenis, String os, int ram, int storage) {
        super(id, nama, harga, merk, garansi);
        this.jenis = jenis;
        this.os = os;
        this.ram = ram;
        this.storage = storage;
    }

    // setter
    public void setJenis(String jenis) {
        this.jenis = jenis;
    }

    public void setOS(String os) {
        this.os = os;
    }

    public void setRam(int ram) {
        this.ram = ram;
    }

    public void setStorage(int storage) {
        this.storage = storage;
    }

    // getter
    public String getJenis() {
        return jenis;
    }

    public String getOS() {
        return os;
    }

    public int getRam() {
        return ram;
    }

    public int getStorage() {
        return storage;
    }
}
