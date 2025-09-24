from Barang import Barang

class Elektronik(Barang):
    def __init__(self, id=0, nama="", harga=0, merk="", garansi=0):
        super().__init__(id, nama, harga)
        self.merk = merk
        self.garansi = garansi  # bulan

    def getMerk(self): return self.merk
    def getGaransi(self): return self.garansi

    def setMerk(self, merk): self.merk = merk
    def setGaransi(self, garansi): self.garansi = garansi
