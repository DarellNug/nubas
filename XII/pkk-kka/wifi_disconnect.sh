#!/bin/bash

echo "======================================================="
echo "       SIMULASI MACOS: WI-FI DISCONNECTED EVENT        "
echo "======================================================="
read -p "[Tekan ENTER untuk memicu peringatan Wi-Fi Disconnected...]"

echo "📡 Mendeteksi jaringan Wi-Fi..."
sleep 0.4
echo "⚠️  Status: Wi-Fi Disconnected!"
echo "🔔 Memunculkan notifikasi & dialog native macOS..."

# 1. Native macOS Notification Banner
osascript -e 'display notification "Koneksi ke jaringan Wi-Fi terputus. Mac Anda saat ini offline." with title "Wi-Fi" subtitle "Disconnected" sound name "Basso"'

# 2. Native macOS Alert Modal Dialog
BUTTON=$(osascript -e 'set res to button returned of (display alert "Wi-Fi: Disconnected" message "Jaringan Wi-Fi Anda terputus.\n\nPerangkat Mac Anda saat ini tidak memiliki akses ke internet." as warning buttons {"Network Settings...", "Tutup"} default button "Tutup")
return res')

if [[ "$BUTTON" == *"Network Settings"* ]]; then
  echo "⚙️ Membuka Network Settings macOS..."
  open "x-apple.systempreferences:com.apple.Network-Settings.extension"
else
  echo "👌 Dialog ditutup."
fi

echo "======================================================="
