import React, { useState } from 'react';
import {
  X,
  Key,
  ShieldAlert,
  CheckCircle2,
  AlertTriangle,
  DoorOpen,
  DoorClosed,
  Copy,
  Check,
  ChevronLeft,
  ChevronRight,
  Crosshair,
  ExternalLink,
  Wrench,
} from 'lucide-react';

export function LockerModal({
  locker,
  isOpen = false,
  allLockers = [],
  onClose,
  onToggleDoor,
  onFocusLocker,
  onNavigateLocker,
}) {
  const [copied, setCopied] = useState(false);

  if (!locker) return null;

  const handleCopyCode = () => {
    if (locker.Kode_Silinder) {
      navigator.clipboard.writeText(locker.Kode_Silinder);
      setCopied(true);
      setTimeout(() => setCopied(false), 2000);
    }
  };

  // Compute Island number from Row letter
  const getIslandDescription = (row) => {
    switch (row) {
      case 'A': return 'Meja 1 (Paling Kiri) — Sisi Luar (Hadap Dinding)';
      case 'B': return 'Meja 1 (Paling Kiri) — Sisi Dalam (Hadap Meja 2)';
      case 'C': return 'Meja 2 — Sisi Luar (Hadap Meja 1)';
      case 'D': return 'Meja 2 — Sisi Dalam (Hadap Pilar Beton & Meja 3)';
      case 'E': return 'Meja 3 — Sisi Dalam (Hadap Pilar Beton & Meja 2)';
      case 'F': return 'Meja 3 — Sisi Luar (Hadap Meja 4)';
      case 'G': return 'Meja 4 (Paling Kanan) — Sisi Dalam (Hadap Meja 3)';
      case 'H': return 'Meja 4 (Paling Kanan) — Sisi Luar (Hadap Jendela Berjalusi)';
      default: return 'Meja Praktikum Siswa';
    }
  };

  // Find index in list for next/prev navigation
  const currentIndex = allLockers.findIndex((item) => item.No_Loker === locker.No_Loker);
  const prevLocker = currentIndex > 0 ? allLockers[currentIndex - 1] : null;
  const nextLocker = currentIndex < allLockers.length - 1 ? allLockers[currentIndex + 1] : null;

  const isMacet = locker.Status_Silinder === 'Macet Oksidasi';
  const isHilang = locker.Status_Silinder === 'Hilang';
  const isLengkap = locker.Status_Kunci === 'Lengkap';
  const isKurang = locker.Status_Kunci === 'Kurang 1';
  const isGanda = locker.Status_Kunci === 'Dipegang Ganda';

  return (
    <div className="fixed top-28 sm:top-24 right-3 sm:right-4 z-20 w-80 sm:w-96 pointer-events-none">
      <div className="glass-panel rounded-2xl border border-white/15 shadow-2xl overflow-hidden pointer-events-auto transition-all animate-in fade-in slide-in-from-right-4 duration-300">
        {/* Header */}
        <div className="p-4 bg-gradient-to-r from-slate-900/90 via-slate-800/80 to-slate-900/90 border-b border-white/10 flex items-center justify-between">
          <div className="flex items-center gap-2.5">
            <div className="w-9 h-9 rounded-xl bg-sky-500/20 border border-sky-400/30 flex items-center justify-center font-mono font-black text-sky-400 text-base shadow-lg shadow-sky-500/10">
              {locker.No_Loker}
            </div>
            <div>
              <div className="flex items-center gap-2">
                <h3 className="font-extrabold text-white text-base tracking-wide">
                  LOKER {locker.No_Loker}
                </h3>
                {isMacet && (
                  <span className="px-2 py-0.5 rounded-full bg-orange-500/20 text-orange-300 border border-orange-500/40 text-[10px] font-bold animate-pulse">
                    Macet Karat
                  </span>
                )}
              </div>
              <p className="text-[11px] text-slate-400">
                {getIslandDescription(locker.Baris)}
              </p>
            </div>
          </div>

          <button
            onClick={onClose}
            className="p-1.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-700/60 transition-colors"
          >
            <X className="w-5 h-5" />
          </button>
        </div>

        {/* Body Content */}
        <div className="p-4 space-y-3.5">
          {/* Main Key & Cylinder Details Grid */}
          <div className="grid grid-cols-2 gap-2.5">
            {/* Cylinder Code Box */}
            <div className="p-3 rounded-xl bg-slate-900/80 border border-slate-700/60">
              <span className="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">
                Kode Silinder
              </span>
              <div className="flex items-center justify-between mt-1">
                <span className="font-mono font-black text-lg text-amber-300">
                  {locker.Kode_Silinder || '-'}
                </span>
                {locker.Kode_Silinder && locker.Kode_Silinder !== 'Hilang' && (
                  <button
                    onClick={handleCopyCode}
                    className="p-1 text-slate-400 hover:text-white transition-colors"
                    title="Salin Kode Silinder"
                  >
                    {copied ? (
                      <Check className="w-3.5 h-3.5 text-emerald-400" />
                    ) : (
                      <Copy className="w-3.5 h-3.5" />
                    )}
                  </button>
                )}
              </div>
            </div>

            {/* Key Count Box */}
            <div className="p-3 rounded-xl bg-slate-900/80 border border-slate-700/60">
              <span className="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">
                Anak Kunci
              </span>
              <div className="flex items-center gap-1.5 mt-1">
                <span className="font-mono font-black text-lg text-white">
                  {locker.Jumlah_Anak_Kunci}
                </span>
                <div className="flex items-center text-amber-400">
                  {typeof locker.Jumlah_Anak_Kunci === 'number' &&
                    Array.from({ length: Math.min(2, locker.Jumlah_Anak_Kunci) }).map((_, i) => (
                      <Key key={i} className="w-4 h-4" />
                    ))}
                </div>
              </div>
            </div>
          </div>

          {/* Status Badges */}
          <div className="space-y-1.5">
            <div className="flex items-center justify-between text-xs py-1 border-b border-slate-800">
              <span className="text-slate-400">Kondisi Fisik Silinder:</span>
              <span
                className={`font-semibold px-2 py-0.5 rounded-lg text-xs ${
                  isMacet
                    ? 'bg-orange-500/20 text-orange-300 border border-orange-500/40 font-bold'
                    : isHilang
                    ? 'bg-red-500/20 text-red-300 border border-red-500/40'
                    : 'bg-slate-800 text-slate-200'
                }`}
              >
                {locker.Status_Silinder}
              </span>
            </div>

            <div className="flex items-center justify-between text-xs py-1 border-b border-slate-800">
              <span className="text-slate-400">Status Kelengkapan Kunci:</span>
              <span
                className={`font-semibold px-2 py-0.5 rounded-lg text-xs ${
                  isLengkap
                    ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/40'
                    : isKurang
                    ? 'bg-amber-500/20 text-amber-300 border border-amber-500/40'
                    : isGanda
                    ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40'
                    : 'bg-red-500/20 text-red-300 border border-red-500/40'
                }`}
              >
                {locker.Status_Kunci}
              </span>
            </div>
          </div>

          {/* Contextual Notes / Keterangan Box */}
          <div className="p-3 rounded-xl bg-slate-900/60 border border-slate-700/50 space-y-1">
            <div className="flex items-center gap-1.5 text-xs font-bold text-slate-300">
              <Wrench className="w-3.5 h-3.5 text-sky-400" />
              <span>Catatan Pemeriksaan & Rekomendasi:</span>
            </div>
            <p className="text-xs text-slate-300 leading-relaxed font-normal">
              {locker.Keterangan || 'Tidak ada catatan khusus untuk loker ini.'}
            </p>
          </div>

          {/* Action Buttons: Toggle Door & Focus Camera */}
          <div className="grid grid-cols-2 gap-2 pt-1">
            <button
              onClick={() => onToggleDoor(locker.No_Loker)}
              className={`py-2 px-3 rounded-xl text-xs font-bold flex items-center justify-center gap-2 transition-all border ${
                isOpen
                  ? 'bg-amber-500/20 text-amber-300 border-amber-400/40 hover:bg-amber-500/30'
                  : 'bg-sky-600/30 text-sky-200 border-sky-400/40 hover:bg-sky-600/40'
              }`}
            >
              {isOpen ? (
                <>
                  <DoorClosed className="w-4 h-4" />
                  <span>Tutup Pintu</span>
                </>
              ) : (
                <>
                  <DoorOpen className="w-4 h-4" />
                  <span>Buka Pintu (70°)</span>
                </>
              )}
            </button>

            <button
              onClick={() => onFocusLocker(locker.No_Loker)}
              className="py-2 px-3 rounded-xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 text-xs font-bold flex items-center justify-center gap-2 transition-all"
            >
              <Crosshair className="w-4 h-4 text-sky-400" />
              <span>Fokus 3D</span>
            </button>
          </div>

          {/* Prev / Next Locker Navigation */}
          <div className="flex items-center justify-between pt-2 border-t border-slate-800">
            <button
              disabled={!prevLocker}
              onClick={() => prevLocker && onNavigateLocker(prevLocker)}
              className="px-2.5 py-1 rounded-lg text-xs text-slate-400 hover:text-white disabled:opacity-30 disabled:pointer-events-none flex items-center gap-1"
            >
              <ChevronLeft className="w-4 h-4" />
              <span>{prevLocker ? prevLocker.No_Loker : 'Awal'}</span>
            </button>

            <span className="text-[11px] text-slate-500 font-mono">
              {currentIndex + 1} / {allLockers.length}
            </span>

            <button
              disabled={!nextLocker}
              onClick={() => nextLocker && onNavigateLocker(nextLocker)}
              className="px-2.5 py-1 rounded-lg text-xs text-slate-400 hover:text-white disabled:opacity-30 disabled:pointer-events-none flex items-center gap-1"
            >
              <span>{nextLocker ? nextLocker.No_Loker : 'Akhir'}</span>
              <ChevronRight className="w-4 h-4" />
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
