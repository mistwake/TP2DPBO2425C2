#include <iostream>
#include "Elektronik.cpp"
using namespace std;

class Gadget : public Elektronik
{
private:
    string jenis; // HP/Laptop/Tablet
    string os;
    int ram;     // GB
    int storage; // GB

public:
    Gadget() {}

    Gadget(int id, string nama, int harga,
           string merk, int garansi,
           string jenis, string os, int ram, int storage)
        : Elektronik(id, nama, harga, merk, garansi)
    {
        this->jenis = jenis;
        this->os = os;
        this->ram = ram;
        this->storage = storage;
    }

    // setter
    void setJenis(string jenis) { this->jenis = jenis; }
    void setOS(string os) { this->os = os; }
    void setRam(int ram) { this->ram = ram; }
    void setStorage(int storage) { this->storage = storage; }

    // getter
    string getJenis() { return jenis; }
    string getOS() { return os; }
    int getRam() { return ram; }
    int getStorage() { return storage; }
};
