public class Elektronik extends Barang {
    private String merk;
    private int garansi; // bulan

    public Elektronik() {
    }

    public Elektronik(int id, String nama, int harga, String merk, int garansi) {
        super(id, nama, harga);
        this.merk = merk;
        this.garansi = garansi;
    }

    // setter
    public void setMerk(String merk) {
        this.merk = merk;
    }

    public void setGaransi(int garansi) {
        this.garansi = garansi;
    }

    // getter
    public String getMerk() {
        return merk;
    }

    public int getGaransi() {
        return garansi;
    }
}
