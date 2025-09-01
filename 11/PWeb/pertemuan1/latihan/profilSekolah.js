// 1. Memilih elemen dengan ID 'judul-utama'
const namaSekolah = document.getElementById("nama-sekolah");
document.writeln("Elemen by ID 'nama-sekolah': ", namaSekolah, "<br>");

// 2. Memilih semua elemen <p>
const semuaParagraf = document.getElementsByTagName("p");
document.writeln("Semua elemen 'p' : ", semuaParagraf, "<br>");

// 3. Memilih semua dengan kelas 'jurusan'
const pilihanJurusan = document.getElementsByClassName("jurusan");
document.writeln("Elemen by Class 'jurusan' : ", pilihanJurusan, "<br>");

// 4. Memilih elemen pertama daengan kelas 'paragraf menggunakan querySelector
const paragrafPertama = document.querySelector("paragraf");
document.writeln("Query Selector '.paragraf' : ", paragrafPertama, "<br>");

// 5. Memilih semua elemen <li> menggunakan querySelectorAll
const semuaItem = document.querySelector("li");
document.writeln("Query Selector All 'li' : ", semuaItem);