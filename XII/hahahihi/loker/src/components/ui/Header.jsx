import React, { useState, useEffect } from 'react';
import {
  Volume2,
  VolumeX,
  RotateCcw,
  CheckCircle2,
  AlertTriangle,
  XCircle,
  HelpCircle,
  Clock,
  Layers,
  Sparkles,
  KeyRound,
  ShieldAlert,
  SlidersHorizontal,
} from 'lucide-react';
import { toggleAudio, isAudioEnabled } from '../../utils/audio';

export function Header({
  kpis,
  onResetCamera,
  activeFilter,
  onFilterChange,
  showMinimap,
  onToggleMinimap,
}) {
  const [soundOn, setSoundOn] = useState(isAudioEnabled());
  const [timeStr, setTimeStr] = useState('');

  useEffect(() => {
    const updateTime = () => {
      const now = new Date();
      setTimeStr(
        now.toLocaleTimeString('id-ID', {
          hour: '2-digit',
          minute: '2-digit',
          second: '2-digit',
        })
      );
    };
    updateTime();
    const interval = setInterval(updateTime, 1000);
    return () => clearInterval(interval);
  }, []);

  const handleToggleSound = () => {
    const next = !soundOn;
    toggleAudio(next);
    setSoundOn(next);
  };

  return (
    <header className="fixed top-0 left-0 right-0 z-30 pointer-events-none p-3 sm:p-4">
      <div className="max-w-7xl mx-auto flex flex-col gap-2.5">
        {/* Top Branding & Main Controls Bar */}
        <div className="glass-panel rounded-2xl px-4 py-2.5 flex items-center justify-between pointer-events-auto border border-white/10 shadow-2xl">
          {/* Logo & School Identity */}
          <div className="flex items-center gap-3">
            <div className="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-amber-500 p-0.5 flex items-center justify-center shadow-lg shadow-blue-500/20">
              <div className="w-full h-full bg-slate-900 rounded-[10px] flex items-center justify-center">
                <Layers className="w-5 h-5 text-sky-400" />
              </div>
            </div>
            <div>
              <div className="flex items-center gap-2">
                <h1 className="font-extrabold text-sm sm:text-base text-white tracking-wide">
                  SMK LAB DIGITAL TWIN
                </h1>
                <span className="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 hidden sm:inline-flex items-center gap-1">
                  <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping" />
                  Live Sync
                </span>
              </div>
              <p className="text-[11px] text-slate-400">
                Visualisasi 3D Interaktif & Inventaris Kunci Loker Siswa (1:1 Architectural Model)
              </p>
            </div>
          </div>

          {/* Right Action Buttons */}
          <div className="flex items-center gap-2">
            {/* Live Clock */}
            <div className="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-800/80 border border-slate-700/60 text-xs font-mono text-slate-300">
              <Clock className="w-3.5 h-3.5 text-amber-400" />
              <span>{timeStr || '12:00:00'} WIB</span>
            </div>

            {/* Minimap Toggle */}
            <button
              onClick={onToggleMinimap}
              className={`px-3 py-1.5 rounded-xl text-xs font-semibold flex items-center gap-1.5 transition-all border ${
                showMinimap
                  ? 'bg-sky-500/20 text-sky-300 border-sky-400/40 shadow-lg shadow-sky-500/10'
                  : 'bg-slate-800/80 text-slate-300 border-slate-700 hover:bg-slate-700'
              }`}
              title="Tampilkan / Sembunyikan Denah 2D Minimap"
            >
              <SlidersHorizontal className="w-3.5 h-3.5" />
              <span className="hidden sm:inline">Denah 2D</span>
            </button>

            {/* Reset Camera Button */}
            <button
              onClick={onResetCamera}
              className="p-2 sm:px-3 sm:py-1.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 border border-slate-700 text-slate-300 hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-all"
              title="Reset Sudut Pandang Kamera"
            >
              <RotateCcw className="w-3.5 h-3.5 text-sky-400" />
              <span className="hidden sm:inline">Reset Kamera</span>
            </button>

            {/* Audio Toggle */}
            <button
              onClick={handleToggleSound}
              className="p-2 rounded-xl bg-slate-800/80 hover:bg-slate-700 border border-slate-700 text-slate-300 hover:text-white transition-all"
              title={soundOn ? 'Nonaktifkan Suara Efek' : 'Aktifkan Suara Efek'}
            >
              {soundOn ? (
                <Volume2 className="w-4 h-4 text-emerald-400" />
              ) : (
                <VolumeX className="w-4 h-4 text-slate-500" />
              )}
            </button>
          </div>
        </div>

        {/* Dynamic KPI Header Bar (Real-time computed from parsed CSV) */}
        <div className="glass-panel rounded-2xl p-2 sm:p-2.5 flex items-center gap-1.5 sm:gap-2 overflow-x-auto pointer-events-auto border border-white/10 scrollbar-none shadow-xl">
          {/* Total Lockers Badge */}
          <button
            onClick={() => onFilterChange('all')}
            className={`flex items-center gap-2 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-bold border ${
              activeFilter === 'all'
                ? 'bg-blue-600/30 text-blue-300 border-blue-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <Layers className="w-3.5 h-3.5 text-blue-400" />
            <span>Total Loker</span>
            <span className="px-1.5 py-0.5 rounded-md bg-blue-500/20 text-blue-300 font-mono text-xs">
              {kpis.total}
            </span>
          </button>

          {/* Lengkap (Green) */}
          <button
            onClick={() => onFilterChange('Lengkap')}
            className={`flex items-center gap-1.5 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-semibold border ${
              activeFilter === 'Lengkap'
                ? 'bg-emerald-600/30 text-emerald-300 border-emerald-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <CheckCircle2 className="w-3.5 h-3.5 text-emerald-400" />
            <span>Lengkap</span>
            <span className="px-1.5 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-mono text-xs">
              {kpis.lengkap}
            </span>
          </button>

          {/* Kurang 1 Kunci (Amber) */}
          <button
            onClick={() => onFilterChange('Kurang 1')}
            className={`flex items-center gap-1.5 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-semibold border ${
              activeFilter === 'Kurang 1'
                ? 'bg-amber-600/30 text-amber-300 border-amber-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <AlertTriangle className="w-3.5 h-3.5 text-amber-400" />
            <span>Kurang 1</span>
            <span className="px-1.5 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-mono text-xs">
              {kpis.kurang1}
            </span>
          </button>

          {/* Kunci Tidak Ada (Red) */}
          <button
            onClick={() => onFilterChange('Tidak Ada')}
            className={`flex items-center gap-1.5 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-semibold border ${
              activeFilter === 'Tidak Ada'
                ? 'bg-red-600/30 text-red-300 border-red-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <XCircle className="w-3.5 h-3.5 text-red-400" />
            <span>Kunci Hilang</span>
            <span className="px-1.5 py-0.5 rounded-md bg-red-500/20 text-red-300 font-mono text-xs">
              {kpis.tidakAda}
            </span>
          </button>

          {/* Silinder Hilang (Dark Red / Hollow) */}
          <button
            onClick={() => onFilterChange('Silinder Hilang')}
            className={`flex items-center gap-1.5 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-semibold border ${
              activeFilter === 'Silinder Hilang'
                ? 'bg-rose-600/30 text-rose-300 border-rose-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <span className="text-sm">🕳️</span>
            <span>Silinder Hilang</span>
            <span className="px-1.5 py-0.5 rounded-md bg-rose-500/20 text-rose-300 font-mono text-xs">
              {kpis.silinderHilang}
            </span>
          </button>

          {/* Silinder Macet Oksidasi (Orange / Rust, e.g. A6) */}
          <button
            onClick={() => onFilterChange('Macet Oksidasi')}
            className={`flex items-center gap-1.5 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-semibold border ${
              activeFilter === 'Macet Oksidasi'
                ? 'bg-orange-600/30 text-orange-300 border-orange-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <ShieldAlert className="w-3.5 h-3.5 text-orange-400" />
            <span>Macet Oksidasi</span>
            <span className="px-1.5 py-0.5 rounded-md bg-orange-500/20 text-orange-300 font-mono text-xs font-bold">
              {kpis.macetOksidasi}
            </span>
          </button>

          {/* Dipegang Ganda (Cyan) */}
          <button
            onClick={() => onFilterChange('Dipegang Ganda')}
            className={`flex items-center gap-1.5 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-semibold border ${
              activeFilter === 'Dipegang Ganda'
                ? 'bg-cyan-600/30 text-cyan-300 border-cyan-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <KeyRound className="w-3.5 h-3.5 text-cyan-400" />
            <span>Di Ganda</span>
            <span className="px-1.5 py-0.5 rounded-md bg-cyan-500/20 text-cyan-300 font-mono text-xs">
              {kpis.diGanda}
            </span>
          </button>

          {/* Belum Dicek (Slate Grey) */}
          <button
            onClick={() => onFilterChange('Belum Dicek')}
            className={`flex items-center gap-1.5 px-3 py-1.5 rounded-xl transition-all whitespace-nowrap text-xs font-semibold border ${
              activeFilter === 'Belum Dicek'
                ? 'bg-slate-600/40 text-slate-200 border-slate-400/50 shadow-md'
                : 'bg-slate-800/60 text-slate-300 border-slate-700/60 hover:bg-slate-800'
            }`}
          >
            <HelpCircle className="w-3.5 h-3.5 text-slate-400" />
            <span>Belum Dicek</span>
            <span className="px-1.5 py-0.5 rounded-md bg-slate-700 text-slate-300 font-mono text-xs">
              {kpis.belumDicek}
            </span>
          </button>
        </div>
      </div>
    </header>
  );
}
