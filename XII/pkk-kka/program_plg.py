#!/usr/bin/env python3
import time
import sys

def main():
    print("=" * 50)
    print("   SISTEM PEMROGRAMAN: BUILD & TEST PIPELINE   ")
    print("=" * 50)
    input("\n[Tekan ENTER untuk memulai proses kompilasi & testing...]\n")

    print("⏳ Memeriksa struktur proyek & konfigurasi...", end="", flush=True)
    time.sleep(0.4)
    print(" -> \033[92m[ OK ]\033[0m")

    print("⏳ Melakukan linting & syntax check...", end="", flush=True)
    time.sleep(0.5)
    print(" -> \033[92m[ OK ]\033[0m")

    print("⏳ Mengompilasi source code (Main.py)...", end="", flush=True)
    time.sleep(0.6)
    print(" -> \033[91m[ ERROR ]\033[0m")

    time.sleep(0.2)
    print("\n\033[91mTraceback (most recent call last):")
    print('  File "app/controller/main_logic.py", line 42, in process_data')
    print("    result = total_items / user_count")
    print("ZeroDivisionError: division by zero -> Pembagian dengan nol ditemukan!\033[0m\n")

    time.sleep(0.3)
    print("=" * 50)
    print("\033[1;91m✖ STATUS: FAILED (PROSES PEMROGRAMAN GAGAL)\033[0m")
    print("Terjadi runtime error pada kode program. Silakan periksa traceback di atas.")
    print("=" * 50 + "\n")
    sys.exit(1)

if __name__ == "__main__":
    main()
