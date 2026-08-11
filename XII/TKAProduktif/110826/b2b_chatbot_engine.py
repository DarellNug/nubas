from transformers import pipeline
import warnings

# Menyembunyikan warning bawaan library agar terminal tetap rapi
warnings.filterwarnings("ignore")

print("[SYSTEM] Memuat Core AI NLP B2B...")
print("[SYSTEM] Terhubung ke Transformers. Mendownload/Memuat model Multilingual...")

# KUNCI PERUBAHAN: Kita ganti ke model yang paham lebih dari 100 bahasa (termasuk Bahasa Indonesia)
nlp_model = pipeline("zero-shot-classification", model="MoritzLaurer/mDeBERTa-v3-base-mnli-xnli")

print("\n==========================================")
print("       TERMINAL DIAGNOSA MEDIS AI         ")
print("==========================================")

while True:
    keluhan = input("\n[INPUT] Masukkan keluhan (atau ketik 'exit'): ")
    if keluhan.lower() == 'exit':
        break
        
    print("[AI] Memproses komputasi bahasa natural (NLP)...\n")
    
    # Labelnya kita sesuaikan biar lebih komprehensif nangkep berbagai keluhan
    label_medis = [
        "infeksi virus", 
        "gangguan pencernaan", 
        "nyeri sendi dan otot", 
        "radang pernapasan", 
        "sakit kepala atau saraf",
        "reaksi alergi"
    ]
    
    hasil = nlp_model(keluhan, label_medis)
    
    print("[AI] HASIL DIAGNOSA BERDASARKAN PROBABILITAS TEKS:")
    for i in range(3):
        label = hasil['labels'][i]
        score = hasil['scores'][i] * 100
        print(f" >> Kategori: {label.upper()} (Tingkat Keyakinan: {score:.1f}%)")
        
    print("\n[SYSTEM] Rekomendasi: Verifikasi lanjutan dengan dokter spesialis.")
