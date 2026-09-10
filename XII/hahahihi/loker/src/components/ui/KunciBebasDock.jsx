import React, { useState } from 'react';
import {
  Key,
  Compass,
  Sparkles,
  ChevronUp,
  ChevronDown,
  Info,
  ExternalLink,
  Target,
  ArrowRight,
} from 'lucide-react';
import { playPredictionRadarSound } from '../../utils/audio';

export function KunciBebasDock({
  unassignedKeys = [],
  isPredicting = false,
  onTogglePrediction,
  onFocusLocker,
}) {
  const [isExpanded, setIsExpanded] = useState(true);

  const handlePredictClick = () => {
    playPredictionRadarSound();
    onTogglePrediction();
  };

  return (
    <div className="fixed bottom-20 sm:bottom-4 right-3 sm:right-4 z-20 w-80 sm:w-96 pointer-events-none">
      <div className="glass-panel rounded-2xl border border-amber-500/30 shadow-2xl overflow-hidden pointer-events-auto transition-all duration-300">
        {/* Header Accordion */}
        <div
          onClick={() => setIsExpanded(!isExpanded)}
          className="px-4 py-3 bg-gradient-to-r from-amber-950/40 via-slate-900/60 to-slate-900/40 flex items-center justify-between cursor-pointer border-b border-amber-500/20"
        >
          <div className="flex items-center gap-2.5">
            <div className="w-8 h-8 rounded-lg bg-amber-500/20 border border-amber-400/40 flex items-center justify-center text-amber-400 shadow-lg shadow-amber-500/10">
              <Key className="w-4 h-4" />
            </div>
            <div>
              <div className="flex items-center gap-2">
                <span className="font-extrabold text-xs text-white tracking-wide">
                  RAK KUNCI BEBAS
                </span>
                <span className="px-1.5 py-0.2 rounded-md bg-amber-500/30 text-amber-300 font-mono text-[10px] font-bold border border-amber-400/40">
                  {unassignedKeys.length} Unassigned
                </span>
              </div>
              <p className="text-[10px] text-amber-200/70">
                Kunci fisik tanpa label loker (Baris = "-")
              </p>
            </div>
          </div>

          <button className="text-slate-400 hover:text-white p-1">
            {isExpanded ? (
              <ChevronDown className="w-4 h-4" />
            ) : (
              <ChevronUp className="w-4 h-4" />
            )}
          </button>
        </div>

        {/* Expanded Content */}
        {isExpanded && (
          <div className="p-3.5 space-y-3">
            {/* List of unassigned keys */}
            <div className="space-y-2">
              {unassignedKeys.map((item, idx) => {
                const isB742 = item.Kode_Silinder === 'B742';
                const refNeighbor = isB742 ? 'A4' : 'H12';
                const refCode = isB742 ? 'B741' : 'B812';

                return (
                  <div
                    key={item.No_Loker || idx}
                    className="p-2.5 rounded-xl bg-slate-900/80 border border-slate-700/70 space-y-1.5"
                  >
                    <div className="flex items-center justify-between">
                      <div className="flex items-center gap-2">
                        <span className="font-mono font-black text-sm text-amber-400 bg-amber-950/60 px-2 py-0.5 rounded border border-amber-600/40">
                          {item.Kode_Silinder}
                        </span>
                        <span className="text-[11px] font-semibold text-slate-300">
                          {item.Jumlah_Anak_Kunci} Anak Kunci
                        </span>
                      </div>
                      <span className="text-[10px] px-2 py-0.5 rounded-full bg-slate-800 text-slate-300 border border-slate-700">
                        {item.Status_Kunci}
                      </span>
                    </div>

                    <p className="text-[11px] text-slate-300 leading-snug">
                      {item.Keterangan}
                    </p>

                    {/* Neighbor Clue Link */}
                    <div className="flex items-center justify-between pt-1 border-t border-slate-800">
                      <div className="text-[10px] text-slate-400 flex items-center gap-1">
                        <span>Seri Tetangga:</span>
                        <span className="font-mono text-purple-300 font-bold">
                          {refNeighbor} ({refCode})
                        </span>
                      </div>
                      <button
                        onClick={() => onFocusLocker(refNeighbor)}
                        className="text-[10px] text-sky-400 hover:text-sky-300 font-semibold flex items-center gap-1 bg-sky-950/40 px-2 py-0.5 rounded border border-sky-800/40"
                      >
                        <span>Cek Loker {refNeighbor}</span>
                        <ArrowRight className="w-3 h-3" />
                      </button>
                    </div>
                  </div>
                );
              })}
            </div>

            {/* Prediction Button */}
            <button
              onClick={handlePredictClick}
              className={`w-full py-2.5 px-4 rounded-xl text-xs font-extrabold flex items-center justify-center gap-2 transition-all shadow-lg ${
                isPredicting
                  ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-slate-950 ring-2 ring-amber-300 shadow-amber-500/30 animate-pulse'
                  : 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white shadow-blue-500/20'
              }`}
            >
              <Target className={`w-4 h-4 ${isPredicting ? 'animate-spin' : ''}`} />
              <span>
                {isPredicting
                  ? 'Matikan Radar Prediksi 3D'
                  : 'Cek Prediksi Lokasi Loker (Radar 3D)'}
              </span>
              <Sparkles className="w-3.5 h-3.5" />
            </button>

            {/* Context Note / Locksmith Intelligence */}
            {isPredicting && (
              <div className="p-2.5 rounded-xl bg-amber-500/10 border border-amber-500/30 text-[11px] text-amber-200 leading-relaxed flex items-start gap-2">
                <Info className="w-4 h-4 text-amber-400 shrink-0 mt-0.5" />
                <div>
                  <strong>Analisis Algoritma Seri Silinder:</strong>
                  <p className="mt-0.5 text-amber-200/90">
                    Kunci <strong>B742</strong> & <strong>B811</strong> merupakan seri berurutan
                    dari <strong>A4 (B741)</strong> dan <strong>H12 (B812)</strong>. Target
                    paling berpeluang adalah <strong>Meja 3 (Baris E & F)</strong> yang saat ini
                    berstatus <em>"Belum Dicek"</em>.
                  </p>
                </div>
              </div>
            )}
          </div>
        )}
      </div>
    </div>
  );
}
