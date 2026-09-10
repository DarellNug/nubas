import * as THREE from 'three';

// Procedural Canvas Texture Generator for Photorealistic SMK Lab Digital Twin

/**
 * 50x50 cm Glossy Floor Tiles Texture
 */
export function createFloorTileTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 1024;
  canvas.height = 1024;
  const ctx = canvas.getContext('2d');

  // Subtle off-white base with slight marble variation
  ctx.fillStyle = '#f0f3f6';
  ctx.fillRect(0, 0, 1024, 1024);

  // 2x2 tile grid in texture
  const tileSize = 512;
  const groutWidth = 10;

  for (let x = 0; x < 2; x++) {
    for (let y = 0; y < 2; y++) {
      const tx = x * tileSize;
      const ty = y * tileSize;

      // Soft gradient for glossy ceramic sheen
      const grad = ctx.createLinearGradient(tx, ty, tx + tileSize, ty + tileSize);
      grad.addColorStop(0, '#fafbfc');
      grad.addColorStop(0.5, '#f4f6f8');
      grad.addColorStop(1, '#eaeff2');

      ctx.fillStyle = grad;
      ctx.fillRect(tx + groutWidth / 2, ty + groutWidth / 2, tileSize - groutWidth, tileSize - groutWidth);

      // Subtle tile edge highlight
      ctx.strokeStyle = 'rgba(255, 255, 255, 0.7)';
      ctx.lineWidth = 2;
      ctx.strokeRect(tx + groutWidth / 2 + 1, ty + groutWidth / 2 + 1, tileSize - groutWidth - 2, tileSize - groutWidth - 2);
    }
  }

  // Grey grout lines
  ctx.fillStyle = '#c5ccd6';
  ctx.fillRect(tileSize - groutWidth / 2, 0, groutWidth, 1024);
  ctx.fillRect(0, tileSize - groutWidth / 2, 1024, groutWidth);

  const texture = new THREE.CanvasTexture(canvas);
  texture.wrapS = THREE.RepeatWrapping;
  texture.wrapT = THREE.RepeatWrapping;
  texture.repeat.set(14, 8); // 14m x 8m with 0.5m tiles
  return texture;
}

/**
 * 20x20 cm Countertop Ceramic Tiles Texture
 */
export function createCountertopTileTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 512;
  canvas.height = 512;
  const ctx = canvas.getContext('2d');

  ctx.fillStyle = '#ffffff';
  ctx.fillRect(0, 0, 512, 512);

  // 4x4 tiles in 512px
  const tileSize = 128;
  const groutWidth = 4;

  for (let x = 0; x < 4; x++) {
    for (let y = 0; y < 4; y++) {
      const tx = x * tileSize;
      const ty = y * tileSize;

      const grad = ctx.createRadialGradient(
        tx + tileSize / 2, ty + tileSize / 2, 5,
        tx + tileSize / 2, ty + tileSize / 2, tileSize / 1.4
      );
      grad.addColorStop(0, '#ffffff');
      grad.addColorStop(0.85, '#f8fafc');
      grad.addColorStop(1, '#e2e8f0');

      ctx.fillStyle = grad;
      ctx.fillRect(tx + groutWidth / 2, ty + groutWidth / 2, tileSize - groutWidth, tileSize - groutWidth);

      // Edge bevel highlight
      ctx.strokeStyle = 'rgba(255,255,255,0.9)';
      ctx.lineWidth = 1;
      ctx.strokeRect(tx + groutWidth / 2 + 1, ty + groutWidth / 2 + 1, tileSize - groutWidth - 2, tileSize - groutWidth - 2);
    }
  }

  // Thin dark grout
  ctx.fillStyle = '#cbd5e1';
  for (let i = 1; i < 4; i++) {
    ctx.fillRect(i * tileSize - groutWidth / 2, 0, groutWidth, 512);
    ctx.fillRect(0, i * tileSize - groutWidth / 2, 512, groutWidth);
  }

  const texture = new THREE.CanvasTexture(canvas);
  texture.wrapS = THREE.RepeatWrapping;
  texture.wrapT = THREE.RepeatWrapping;
  texture.repeat.set(5, 45);
  return texture;
}

/**
 * Dark Teak / Walnut Wood Laminate Texture for Under-Bench Cabinets
 */
export function createWoodLaminateTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 512;
  canvas.height = 512;
  const ctx = canvas.getContext('2d');

  // Deep rich walnut base
  ctx.fillStyle = '#3a2012';
  ctx.fillRect(0, 0, 512, 512);

  // Wood grain stripes
  for (let y = 0; y < 512; y += 2) {
    const darkness = Math.sin(y * 0.06) * 15 + Math.cos(y * 0.18) * 10;
    const r = Math.min(255, Math.max(0, 68 + darkness));
    const g = Math.min(255, Math.max(0, 38 + darkness * 0.7));
    const b = Math.min(255, Math.max(0, 22 + darkness * 0.5));
    ctx.fillStyle = `rgb(${Math.round(r)},${Math.round(g)},${Math.round(b)})`;
    ctx.fillRect(0, y, 512, 2);
  }

  // Subtle vertical noise
  for (let i = 0; i < 600; i++) {
    const x = Math.random() * 512;
    const y = Math.random() * 512;
    const len = 15 + Math.random() * 40;
    ctx.fillStyle = Math.random() > 0.5 ? 'rgba(30, 15, 8, 0.15)' : 'rgba(95, 55, 30, 0.15)';
    ctx.fillRect(x, y, 1.5, len);
  }

  const texture = new THREE.CanvasTexture(canvas);
  texture.wrapS = THREE.RepeatWrapping;
  texture.wrapT = THREE.RepeatWrapping;
  return texture;
}

/**
 * Analog Wall Clock Texture (Dark Blue Rim, Dial, Numbers)
 */
export function createWallClockTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 512;
  canvas.height = 512;
  const ctx = canvas.getContext('2d');

  const cx = 256;
  const cy = 256;
  const r = 240;

  // Outer dark blue bezel matching classroom photo
  ctx.beginPath();
  ctx.arc(cx, cy, r, 0, Math.PI * 2);
  ctx.fillStyle = '#1e3a8a'; // distinct dark blue rim
  ctx.fill();

  // Subtle chrome inner ring
  ctx.beginPath();
  ctx.arc(cx, cy, r - 20, 0, Math.PI * 2);
  ctx.fillStyle = '#cbd5e1';
  ctx.fill();

  // White clock dial
  ctx.beginPath();
  ctx.arc(cx, cy, r - 26, 0, Math.PI * 2);
  ctx.fillStyle = '#ffffff';
  ctx.fill();

  // Minute / Hour tick marks
  for (let i = 0; i < 60; i++) {
    const angle = (i * Math.PI) / 30;
    const isHour = i % 5 === 0;
    const tickLen = isHour ? 18 : 8;
    const innerR = r - 30 - tickLen;
    const outerR = r - 30;

    const x1 = cx + Math.sin(angle) * innerR;
    const y1 = cy - Math.cos(angle) * innerR;
    const x2 = cx + Math.sin(angle) * outerR;
    const y2 = cy - Math.cos(angle) * outerR;

    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.strokeStyle = isHour ? '#1e293b' : '#94a3b8';
    ctx.lineWidth = isHour ? 4 : 2;
    ctx.stroke();
  }

  // Hour numbers 1-12
  ctx.font = 'bold 30px "Plus Jakarta Sans", sans-serif';
  ctx.fillStyle = '#0f172a';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  for (let num = 1; num <= 12; num++) {
    const angle = (num * Math.PI) / 6;
    const nx = cx + Math.sin(angle) * (r - 65);
    const ny = cy - Math.cos(angle) * (r - 65);
    ctx.fillText(num.toString(), nx, ny);
  }

  // Brand text on dial
  ctx.font = '12px sans-serif';
  ctx.fillStyle = '#64748b';
  ctx.fillText('QUARTZ', cx, cy - 40);

  // Default clock hands (10:10 position)
  // Hour hand
  ctx.beginPath();
  ctx.moveTo(cx, cy);
  ctx.lineTo(cx + Math.sin(Math.PI * -0.35) * 80, cy - Math.cos(Math.PI * -0.35) * 80);
  ctx.strokeStyle = '#0f172a';
  ctx.lineWidth = 6;
  ctx.lineCap = 'round';
  ctx.stroke();

  // Minute hand
  ctx.beginPath();
  ctx.moveTo(cx, cy);
  ctx.lineTo(cx + Math.sin(Math.PI * 0.35) * 120, cy - Math.cos(Math.PI * 0.35) * 120);
  ctx.strokeStyle = '#0f172a';
  ctx.lineWidth = 4;
  ctx.lineCap = 'round';
  ctx.stroke();

  // Red second hand
  ctx.beginPath();
  ctx.moveTo(cx - Math.sin(Math.PI * 0.8) * 25, cy + Math.cos(Math.PI * 0.8) * 25);
  ctx.lineTo(cx + Math.sin(Math.PI * 0.8) * 135, cy - Math.cos(Math.PI * 0.8) * 135);
  ctx.strokeStyle = '#dc2626';
  ctx.lineWidth = 2;
  ctx.stroke();

  // Center pin
  ctx.beginPath();
  ctx.arc(cx, cy, 7, 0, Math.PI * 2);
  ctx.fillStyle = '#1e293b';
  ctx.fill();

  const texture = new THREE.CanvasTexture(canvas);
  return texture;
}

/**
 * Indonesian Formal National Portraits Texture (President, Garuda Pancasila, Vice President)
 */
export function createNationalPortraitsTexture(type = 'garuda') {
  const canvas = document.createElement('canvas');
  canvas.width = 400;
  canvas.height = 500;
  const ctx = canvas.getContext('2d');

  // Dark golden carved wooden frame
  ctx.fillStyle = '#b45309';
  ctx.fillRect(0, 0, 400, 500);

  const grad = ctx.createLinearGradient(0, 0, 400, 500);
  grad.addColorStop(0, '#f59e0b');
  grad.addColorStop(0.3, '#78350f');
  grad.addColorStop(0.7, '#d97706');
  grad.addColorStop(1, '#92400e');
  ctx.strokeStyle = grad;
  ctx.lineWidth = 22;
  ctx.strokeRect(11, 11, 378, 478);

  // Inner frame matting (off-white cream)
  ctx.fillStyle = '#f8fafc';
  ctx.fillRect(25, 25, 350, 450);

  if (type === 'garuda') {
    // Red-white background
    ctx.fillStyle = '#dc2626';
    ctx.fillRect(40, 40, 320, 160);
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(40, 200, 320, 160);

    // Golden Garuda Silhouette / Emblem
    ctx.fillStyle = '#d97706';
    ctx.beginPath();
    ctx.arc(200, 180, 70, 0, Math.PI * 2);
    ctx.fill();

    // Wings
    ctx.beginPath();
    ctx.moveTo(200, 180);
    ctx.lineTo(80, 130);
    ctx.lineTo(130, 220);
    ctx.lineTo(200, 240);
    ctx.lineTo(270, 220);
    ctx.lineTo(320, 130);
    ctx.closePath();
    ctx.fillStyle = '#b45309';
    ctx.fill();

    // Center shield
    ctx.fillStyle = '#1e293b';
    ctx.fillRect(175, 160, 50, 60);

    // Text: BHINNEKA TUNGGAL IKA
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(110, 275, 180, 24);
    ctx.strokeStyle = '#d97706';
    ctx.lineWidth = 2;
    ctx.strokeRect(110, 275, 180, 24);

    ctx.font = 'bold 12px "Plus Jakarta Sans", sans-serif';
    ctx.fillStyle = '#0f172a';
    ctx.textAlign = 'center';
    ctx.fillText('GARUDA PANCASILA', 200, 330);
    ctx.font = '9px sans-serif';
    ctx.fillStyle = '#475569';
    ctx.fillText('BHINNEKA TUNGGAL IKA', 200, 291);
  } else if (type === 'president') {
    // Red & white backdrop
    ctx.fillStyle = '#b91c1c';
    ctx.fillRect(40, 40, 320, 200);
    ctx.fillStyle = '#f1f5f9';
    ctx.fillRect(40, 240, 320, 160);

    // President silhouette & formal suit
    ctx.fillStyle = '#0f172a';
    // Shoulders / suit
    ctx.beginPath();
    ctx.ellipse(200, 350, 110, 80, 0, 0, Math.PI * 2);
    ctx.fill();

    // White shirt collar & red tie
    ctx.fillStyle = '#ffffff';
    ctx.beginPath();
    ctx.moveTo(180, 270);
    ctx.lineTo(220, 270);
    ctx.lineTo(200, 320);
    ctx.closePath();
    ctx.fill();

    ctx.fillStyle = '#dc2626';
    ctx.beginPath();
    ctx.moveTo(195, 275);
    ctx.lineTo(205, 275);
    ctx.lineTo(203, 350);
    ctx.lineTo(197, 350);
    ctx.closePath();
    ctx.fill();

    // Head / Face silhouette
    ctx.fillStyle = '#e2a76f';
    ctx.beginPath();
    ctx.ellipse(200, 210, 45, 55, 0, 0, Math.PI * 2);
    ctx.fill();

    // Indonesian Peci (Black cap)
    ctx.fillStyle = '#09090b';
    ctx.beginPath();
    ctx.roundRect(160, 145, 80, 38, [6, 6, 2, 2]);
    ctx.fill();

    // Label
    ctx.font = 'bold 13px "Plus Jakarta Sans", sans-serif';
    ctx.fillStyle = '#0f172a';
    ctx.textAlign = 'center';
    ctx.fillText('PRESIDEN REPUBLIK INDONESIA', 200, 435);
  } else {
    // Vice President
    ctx.fillStyle = '#991b1b';
    ctx.fillRect(40, 40, 320, 200);
    ctx.fillStyle = '#f1f5f9';
    ctx.fillRect(40, 240, 320, 160);

    // Suit
    ctx.fillStyle = '#1e293b';
    ctx.beginPath();
    ctx.ellipse(200, 350, 110, 80, 0, 0, Math.PI * 2);
    ctx.fill();

    // Shirt & tie
    ctx.fillStyle = '#ffffff';
    ctx.beginPath();
    ctx.moveTo(180, 270);
    ctx.lineTo(220, 270);
    ctx.lineTo(200, 320);
    ctx.closePath();
    ctx.fill();

    ctx.fillStyle = '#1e40af';
    ctx.beginPath();
    ctx.moveTo(195, 275);
    ctx.lineTo(205, 275);
    ctx.lineTo(203, 350);
    ctx.lineTo(197, 350);
    ctx.closePath();
    ctx.fill();

    // Head
    ctx.fillStyle = '#deb887';
    ctx.beginPath();
    ctx.ellipse(200, 210, 44, 54, 0, 0, Math.PI * 2);
    ctx.fill();

    // Indonesian Peci (Black cap)
    ctx.fillStyle = '#09090b';
    ctx.beginPath();
    ctx.roundRect(160, 148, 80, 36, [6, 6, 2, 2]);
    ctx.fill();

    // Label
    ctx.font = 'bold 13px "Plus Jakarta Sans", sans-serif';
    ctx.fillStyle = '#0f172a';
    ctx.textAlign = 'center';
    ctx.fillText('WAKIL PRESIDEN REPUBLIK INDONESIA', 200, 435);
  }

  const texture = new THREE.CanvasTexture(canvas);
  return texture;
}

/**
 * Large Magnetic Whiteboard Texture with Lab Notes, Diagrams & Formulas
 */
export function createWhiteboardTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 1024;
  canvas.height = 512;
  const ctx = canvas.getContext('2d');

  // White magnetic board surface
  ctx.fillStyle = '#f8fafc';
  ctx.fillRect(0, 0, 1024, 512);

  // Aluminum frame
  ctx.strokeStyle = '#94a3b8';
  ctx.lineWidth = 14;
  ctx.strokeRect(7, 7, 1010, 498);

  // Handwritten school lab notes in blue, black, and red dry-erase markers
  ctx.font = 'bold 24px "Plus Jakarta Sans", cursive, sans-serif';
  ctx.fillStyle = '#1e3a8a';
  ctx.fillText('JADWAL PRAKTIKUM LAB KOMPUTER & SAINS — KELAS XII', 40, 55);

  ctx.font = '16px monospace';
  ctx.fillStyle = '#0f172a';
  ctx.fillText('1. Inventarisasi & Pemeliharaan Loker Siswa (Meja 1 - 4)', 40, 95);
  ctx.fillText('   - Total 96 Unit Loker | Status Silinder & Kunci Terdata', 40, 120);
  ctx.fillText('2. Pengujian Jaringan LAN & Kalibrasi Perangkat Lab', 40, 155);
  ctx.fillText('   - Topologi: Star / Tree | Gateway: 192.168.1.1', 40, 180);

  // Network diagram doodle on the right side
  ctx.strokeStyle = '#2563eb';
  ctx.lineWidth = 2;
  ctx.strokeRect(620, 80, 90, 45);
  ctx.fillStyle = '#1e293b';
  ctx.fillText('Switch Lab', 628, 108);

  ctx.strokeRect(550, 180, 80, 40);
  ctx.fillText('Meja 1 (A-B)', 555, 205);
  ctx.strokeRect(670, 180, 80, 40);
  ctx.fillText('Meja 2 (C-D)', 675, 205);
  ctx.strokeRect(790, 180, 80, 40);
  ctx.fillText('Meja 3 (E-F)', 795, 205);
  ctx.strokeRect(910, 180, 80, 40);
  ctx.fillText('Meja 4 (G-H)', 915, 205);

  // Connecting lines
  ctx.beginPath();
  ctx.moveTo(665, 125); ctx.lineTo(590, 180);
  ctx.moveTo(665, 125); ctx.lineTo(710, 180);
  ctx.moveTo(665, 125); ctx.lineTo(830, 180);
  ctx.moveTo(665, 125); ctx.lineTo(950, 180);
  ctx.strokeStyle = '#64748b';
  ctx.stroke();

  // Red reminder note
  ctx.font = 'bold 18px "Plus Jakarta Sans", sans-serif';
  ctx.fillStyle = '#dc2626';
  ctx.fillText('PERHATIAN:', 40, 240);
  ctx.font = '15px "Plus Jakarta Sans", sans-serif';
  ctx.fillStyle = '#b91c1c';
  ctx.fillText('* Loker A6: Silinder macet oksidasi, segera beri pelumas / WD-40.', 40, 270);
  ctx.fillText('* Kunci Bebas B742 & B811: Cocokkan dengan deretan Meja 3 (E/F).', 40, 295);
  ctx.fillText('* Siswa wajib mengunci kembali loker masing-masing setelah praktikum selesai!', 40, 320);

  // Subtle erased marker smudges for realism
  ctx.fillStyle = 'rgba(100, 116, 139, 0.04)';
  for (let i = 0; i < 8; i++) {
    ctx.beginPath();
    ctx.ellipse(300 + i * 80, 400, 60, 20, 0.2, 0, Math.PI * 2);
    ctx.fill();
  }

  const texture = new THREE.CanvasTexture(canvas);
  return texture;
}

/**
 * K3 Lab Safety Regulations & Warning Posters for Left Wall
 */
export function createSafetyPosterTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 512;
  canvas.height = 700;
  const ctx = canvas.getContext('2d');

  // Bright yellow K3 safety background as seen in Indonesian schools
  ctx.fillStyle = '#facc15';
  ctx.fillRect(0, 0, 512, 700);

  // Black warning border
  ctx.strokeStyle = '#000000';
  ctx.lineWidth = 12;
  ctx.strokeRect(6, 6, 500, 688);

  // K3 Green Cross Logo
  ctx.fillStyle = '#15803d';
  ctx.beginPath();
  ctx.arc(256, 110, 55, 0, Math.PI * 2);
  ctx.fill();

  ctx.fillStyle = '#ffffff';
  ctx.fillRect(241, 75, 30, 70);
  ctx.fillRect(221, 95, 70, 30);

  // Heading
  ctx.font = 'bold 24px "Plus Jakarta Sans", sans-serif';
  ctx.fillStyle = '#000000';
  ctx.textAlign = 'center';
  ctx.fillText('UTAMAKAN KESELAMATAN', 256, 200);
  ctx.fillText('& KESEHATAN KERJA (K3)', 256, 230);

  // Subheader banner
  ctx.fillStyle = '#000000';
  ctx.fillRect(40, 260, 432, 40);
  ctx.fillStyle = '#facc15';
  ctx.font = 'bold 18px "Plus Jakarta Sans", sans-serif';
  ctx.fillText('TATA TERTIB LABORATORIUM', 256, 287);

  // Rules in white box
  ctx.fillStyle = '#ffffff';
  ctx.fillRect(40, 320, 432, 330);
  ctx.strokeStyle = '#000000';
  ctx.lineWidth = 2;
  ctx.strokeRect(40, 320, 432, 330);

  ctx.textAlign = 'left';
  ctx.font = '14px "Plus Jakarta Sans", sans-serif';
  ctx.fillStyle = '#0f172a';

  const rules = [
    '1. Dilarang membawa makanan & minuman.',
    '2. Gunakan jas lab & alas kaki standar.',
    '3. Bersihkan & rapikan meja setelah praktikum.',
    '4. Kunci loker inventaris dan simpan kunci rapi.',
    '5. Laporkan segera jika ada silinder kunci rusak',
    '   atau kabel listrik yang terkelupas.',
    '6. Matikan saklar lampu & AC sebelum keluar lab.',
    '7. Utamakan ketertiban & kebersihan ruangan.'
  ];

  rules.forEach((rule, idx) => {
    ctx.fillText(rule, 55, 360 + idx * 36);
  });

  const texture = new THREE.CanvasTexture(canvas);
  return texture;
}

/**
 * Notice Board "BERSIHKAN MEJA SETELAH DIGUNAKAN" (Matches classroom photo on pillar/wall)
 */
export function createNoticeSignTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 400;
  canvas.height = 300;
  const ctx = canvas.getContext('2d');

  ctx.fillStyle = '#facc15'; // bright yellow card
  ctx.fillRect(0, 0, 400, 300);

  ctx.strokeStyle = '#dc2626';
  ctx.lineWidth = 10;
  ctx.strokeRect(5, 5, 390, 290);

  ctx.fillStyle = '#0f172a';
  ctx.font = 'bold 26px "Plus Jakarta Sans", sans-serif';
  ctx.textAlign = 'center';
  ctx.fillText('PERHATIAN !', 200, 70);

  ctx.font = 'bold 22px "Plus Jakarta Sans", sans-serif';
  ctx.fillStyle = '#b91c1c';
  ctx.fillText('BERSIHKAN MEJA KERJA', 200, 130);
  ctx.fillText('SETELAH DIGUNAKAN', 200, 165);

  ctx.font = '15px "Plus Jakarta Sans", sans-serif';
  ctx.fillStyle = '#1e293b';
  ctx.fillText('Jaga Kebersihan & Kerapian Lab', 200, 220);
  ctx.fillText('— Pengelola Lab SMK —', 200, 250);

  const texture = new THREE.CanvasTexture(canvas);
  return texture;
}

/**
 * Tropical Foliage Window Exterior Texture (Lush green garden seen outside windows)
 */
export function createWindowExteriorTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 1024;
  canvas.height = 512;
  const ctx = canvas.getContext('2d');

  // Bright sky gradient
  const skyGrad = ctx.createLinearGradient(0, 0, 0, 300);
  skyGrad.addColorStop(0, '#bae6fd');
  skyGrad.addColorStop(0.6, '#e0f2fe');
  skyGrad.addColorStop(1, '#f8fafc');
  ctx.fillStyle = skyGrad;
  ctx.fillRect(0, 0, 1024, 512);

  // Soft distant trees
  ctx.fillStyle = '#86efac';
  for (let x = 0; x < 1024; x += 60) {
    ctx.beginPath();
    ctx.arc(x + Math.random() * 20, 380, 80 + Math.random() * 30, 0, Math.PI * 2);
    ctx.fill();
  }

  // Foreground tropical greenery and trees
  ctx.fillStyle = '#22c55e';
  for (let x = 0; x < 1024; x += 45) {
    ctx.beginPath();
    ctx.arc(x, 420, 70 + Math.random() * 40, 0, Math.PI * 2);
    ctx.fill();
  }

  ctx.fillStyle = '#15803d';
  for (let x = 20; x < 1024; x += 50) {
    ctx.beginPath();
    ctx.arc(x, 460, 60 + Math.random() * 30, 0, Math.PI * 2);
    ctx.fill();
  }

  const texture = new THREE.CanvasTexture(canvas);
  texture.wrapS = THREE.RepeatWrapping;
  texture.wrapT = THREE.RepeatWrapping;
  return texture;
}
