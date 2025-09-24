class Barang:
    def __init__(self, id=0, nama="", harga=0):
        self.id = id
        self.nama = nama
        self.harga = harga

    # getter & setter
    def getId(self): return self.id
    def getNama(self): return self.nama
    def getHarga(self): return self.harga

    def setId(self, id): self.id = id
    def setNama(self, nama): self.nama = nama
    def setHarga(self, harga): self.harga = harga
