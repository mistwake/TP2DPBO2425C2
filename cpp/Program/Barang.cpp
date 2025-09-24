#include <iostream>
#include <string>
using namespace std;

class Barang
{
private:
    int id;
    string nama;
    int harga;

public:
    Barang() {}

    Barang(int id, string nama, int harga)
    {
        this->id = id;
        this->nama = nama;
        this->harga = harga;
    }

    // setter
    void setId(int id)
    {
        this->id = id;
    }
    void setNama(string nama)
    {
        this->nama = nama;
    }
    void setHarga(int harga)
    {
        this->harga = harga;
    }

    // getter
    int getId()
    {
        return id;
    }
    string getNama()
    {
        return nama;
    }
    int getHarga()
    {
        return harga;
    }
};
