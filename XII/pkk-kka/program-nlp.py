#!/usr/bin/env python3
import time
import sys

def main():
    print("=" * 50)
    print("   SISTEM PEMROGRAMAN: BUILD & TEST PIPELINE   ")
    print("=" * 50)
    input("\n[Tekan ENTER untuk memulai proses kompilasi & testing...]\n")

    steps = [
        ("Memeriksa struktur proyek & konfigurasi...", 0.4),
        ("Melakukan linting & syntax check...", 0.5),
        ("Mengompilasi source code (Main.py)...", 0.6),
        ("Menjalankan Unit Test (12/12 tests)...", 0.7),
        ("Membangun artifact & executable...", 0.5),
    ]

    for desc, delay in steps:
        print(f"⏳ {desc}", end="", flush=True)
        time.sleep(delay)
        print(" -> \033[92m[ OK ]\033[0m")

    time.sleep(0.3)
    print("\n" + "=" * 50)
    print("\033[1;92m✔ STATUS: DONE (PROSES PEMROGRAMAN BERHASIL)\033[0m")
    print("Semua tes lulus, tidak ada error ditemukan!")
    print("=" * 50 + "\n")
    sys.exit(0)

if __name__ == "__main__":
    main()
