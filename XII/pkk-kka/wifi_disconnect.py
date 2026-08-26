#!/usr/bin/env python3
import subprocess
import time
import sys

def main():
    print("=" * 55)
    print("      SIMULASI MACOS: WI-FI DISCONNECTED EVENT      ")
    print("=" * 55)
    input("\n[Tekan ENTER untuk memicu peringatan Wi-Fi Disconnected...]\n")

    print("📡 Mendeteksi jaringan Wi-Fi...")
    time.sleep(0.4)
    print("⚠️  Koneksi terputus: Sinyal hilang!")
    time.sleep(0.3)
    print("🔔 Memunculkan notifikasi & alert popup native macOS...")

    # 1. Native macOS Notification Banner di pojok kanan atas
    notif_cmd = '''
    display notification "Koneksi ke jaringan 'Wi-Fi' terputus. Mac Anda saat ini offline." with title "Wi-Fi" subtitle "Disconnected" sound name "Basso"
    '''
    subprocess.run(["osascript", "-e", notif_cmd])

    # 2. Native macOS Alert Modal Dialog
    alert_cmd = '''
    set response to button returned of (display alert "Wi-Fi: Disconnected" message "Jaringan Wi-Fi Anda terputus.\n\nPerangkat Mac Anda saat ini tidak memiliki akses ke internet." as warning buttons {"Network Settings...", "Tutup"} default button "Tutup")
    return response
    '''
    try:
        result = subprocess.run(["osascript", "-e", alert_cmd], capture_output=True, text=True)
        button_clicked = result.stdout.strip()

        if "Network Settings" in button_clicked:
            print("\n⚙️  Pengguna memilih 'Network Settings...'. Membuka Pengaturan Jaringan macOS...")
            subprocess.run(["open", "x-apple.systempreferences:com.apple.Network-Settings.extension"])
        else:
            print("\n👌 Dialog ditutup oleh pengguna.")
    except Exception as e:
        print(f"\nTerjadi kesalahan: {e}")

    print("=" * 55)
    print("✔ Simulasi Wi-Fi Disconnect selesai.")
    print("=" * 55 + "\n")

if __name__ == "__main__":
    main()
