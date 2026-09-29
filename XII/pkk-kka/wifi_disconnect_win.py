#!/usr/bin/env python3
import subprocess
import time
import ctypes

def show_toast():
    # PowerShell command to show a native Windows 10/11 toast notification
    toast_cmd = """
    [Windows.UI.Notifications.ToastNotificationManager, Windows.UI.Notifications, ContentType = WindowsRuntime] > $null;
    $template = [Windows.UI.Notifications.ToastNotificationManager]::GetTemplateContent([Windows.UI.Notifications.ToastTemplateType]::ToastText02);
    $textNodes = $template.GetElementsByTagName("text");
    $textNodes.Item(0).AppendChild($template.CreateTextNode("Wi-Fi")) > $null;
    $textNodes.Item(1).AppendChild($template.CreateTextNode("Koneksi ke jaringan terputus. Windows Anda saat ini offline.")) > $null;
    $toast = [Windows.UI.Notifications.ToastNotification]::new($template);
    $notifier = [Windows.UI.Notifications.ToastNotificationManager]::CreateToastNotifier("Network");
    $notifier.Show($toast);
    """
    subprocess.run(["powershell", "-Command", toast_cmd], capture_output=True)

def main():
    print("=" * 55)
    print("      SIMULASI WINDOWS 11: WI-FI DISCONNECTED EVENT      ")
    print("=" * 55)
    input("\n[Tekan ENTER untuk memicu peringatan Wi-Fi Disconnected...]\n")

    # print("📡 Mendeteksi jaringan Wi-Fi...")
    # time.sleep(0.4)

    # print("🔌 Memutuskan koneksi Wi-Fi secara nyata...")
    subprocess.run(["netsh", "wlan", "disconnect"], capture_output=True)

    # print("⚠️  Koneksi terputus: Sinyal hilang!")
    # time.sleep(0.3)
    # print("🔔 Memunculkan notifikasi & alert popup native Windows...")

    # 1. Native Windows Notification Banner (Toast)
    show_toast()

    # 2. Native Windows Alert Modal Dialog
    # Menggunakan ctypes untuk memunculkan MessageBox native Windows
    # MB_ICONWARNING = 0x30, MB_YESNO = 0x04, MB_TOPMOST = 0x40000

    MB_ICONWARNING = 0x30
    MB_YESNO = 0x04
    MB_TOPMOST = 0x40000

    message = "Jaringan Wi-Fi Anda terputus.\n\nPerangkat Windows Anda saat ini tidak memiliki akses ke internet.\n\nBuka Pengaturan Jaringan?"
    title = "Wi-Fi: Disconnected"

    # ctypes.windll.user32.MessageBoxW(0, text, title, style)
    # Return 6 for Yes, 7 for No
    try:
        result = ctypes.windll.user32.MessageBoxW(0, message, title, MB_ICONWARNING | MB_YESNO | MB_TOPMOST)

        if result == 6:  # IDYES
            print("\n⚙️  Pengguna memilih 'Yes'. Membuka Pengaturan Jaringan Windows...")
            subprocess.run(["cmd", "/c", "start", "ms-settings:network-wifi"])
        else:
            print("\n👌 Dialog ditutup oleh pengguna.")
    except Exception as e:
        print(f"\nTerjadi kesalahan: {e}")

    print("=" * 55)
    print("✔ Simulasi Wi-Fi Disconnect selesai.")
    print("=" * 55 + "\n")

if __name__ == "__main__":
    main()
