// 1. Memilih elemen dengan ID 'judul-utama'
const judul = document.getElementById("judul-utama");
document.writeln("Elemen by ID 'judul-utama': ", judul, "<br>");

// 2. Memilih semua elemen <p>
const semuaParagraf = document.getElementsByTagName("p");
document.writeln("Semua elemen 'p' : ", semuaParagraf, "<br>");

// 3. Memilih semua dengan kelas 'info-sekolah'
const paragrafKelas = document.getElementsByClassName("info-sekolah");
document.writeln("Elemen by Class 'paragraf' : ", paragrafKelas, "<br>");

// 4. Memilih elemen pertama daengan kelas 'paragraf menggunakan querySelector
const paragrafPertama = document.querySelector("info-sekolah");
document.writeln("Query Selector '.paragraf' : ", paragrafPertama, "<br>");

// 5. Memilih semua elemen <li> menggunakan querySelectorAll
const semuaItem = document.querySelector("li");
document.writeln("Query Selector All 'li' : ", semuaItem);