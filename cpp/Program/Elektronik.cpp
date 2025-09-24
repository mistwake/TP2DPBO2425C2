#include <iostream>
#include "Barang.cpp"
using namespace std;

class Elektronik : public Barang
{
private:
    string merk;
    int garansi; // bulan

public:
    Elektronik() {}

    Elektronik(int id, string nama, int harga, string merk, int garansi)
        : Barang(id, nama, harga)
    {
        this->merk = merk;
        this->garansi = garansi;
    }

    // setter
    void setMerk(string merk) { this->merk = merk; }
    void setGaransi(int garansi) { this->garansi = garansi; }

    // getter
    string getMerk() { return merk; }
    int getGaransi() { return garansi; }
};
