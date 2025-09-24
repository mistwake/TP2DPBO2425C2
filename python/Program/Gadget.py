from Elektronik import Elektronik

class Gadget(Elektronik):
    def __init__(self, id=0, nama="", harga=0,
                 merk="", garansi=0,
                 jenis="", os="", ram=0, storage=0):
        super().__init__(id, nama, harga, merk, garansi)
        self.jenis = jenis
        self.os = os
        self.ram = ram
        self.storage = storage

    def getJenis(self): return self.jenis
    def getOS(self): return self.os
    def getRam(self): return self.ram
    def getStorage(self): return self.storage

    def setJenis(self, jenis): self.jenis = jenis
    def setOS(self, os): self.os = os
    def setRam(self, ram): self.ram = ram
    def setStorage(self, storage): self.storage = storage
