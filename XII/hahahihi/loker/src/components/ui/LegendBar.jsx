import React, { useState } from 'react';
import { HelpCircle, ChevronUp, ChevronDown, CheckCircle2, AlertTriangle, ShieldAlert, KeyRound, XCircle } from 'lucide-react';

export function LegendBar() {
  const [isOpen, setIsOpen] = useState(false);

  const legendItems = [
    { label: 'Lengkap', color: '#10b981', desc: 'Silinder ada, 2 anak kunci lengkap (Chrome mulus)' },
    { label: 'Kurang 1', color: '#f59e0b', desc: 'Silinder ada, hanya 1 anak kunci' },
    { label: 'Kunci Tidak Ada', color: '#dc2626', desc: 'Silinder ada, anak kunci tidak ada' },
    { label: 'Silinder Hilang', color: '#7f1d1d', desc: 'Lubang kunci bolong tanpa rumah silinder' },
    { label: 'Macet Oksidasi (A6)', color: '#f97316', desc: 'Silinder berkarat parah & macet putar' },
    { label: 'Di Ganda', color: '#06b6d4', desc: 'Kunci dipegang rangkap/ganda' },
    { label: 'Belum Dicek', color: '#94a3b8', desc: 'Kondisi fisik belum teridentifikasi' },
  ];

  return (
    <div className="fixed top-28 sm:top-24 right-3 sm:right-4 z-10 pointer-events-none">
      <div className="pointer-events-auto">
        {!isOpen ? (
          <button
            onClick={() => setIsOpen(true)}
            className="glass-panel px-3 py-1.5 rounded-xl border border-white/10 text-xs font-semibold text-slate-300 hover:text-white flex items-center gap-1.5 shadow-lg transition-all"
          >
            <HelpCircle className="w-3.5 h-3.5 text-sky-400" />
            <span>Legenda Status 3D</span>
          </button>
        ) : (
          <div className="glass-panel rounded-2xl p-3 border border-white/15 shadow-2xl w-72 animate-in fade-in zoom-in-95 duration-200">
            <div className="flex items-center justify-between pb-2 border-b border-slate-700/60 mb-2">
              <span className="text-xs font-extrabold text-white">LEGENDA STATUS 3D</span>
              <button
                onClick={() => setIsOpen(false)}
                className="text-slate-400 hover:text-white text-xs px-1"
              >
                ✕
              </button>
            </div>
            <div className="space-y-1.5">
              {legendItems.map((item, idx) => (
                <div key={idx} className="flex items-start gap-2 text-[11px]">
                  <span
                    className="w-3 h-3 rounded-full shrink-0 mt-0.5"
                    style={{ backgroundColor: item.color }}
                  />
                  <div>
                    <span className="font-bold text-slate-200">{item.label}: </span>
                    <span className="text-slate-400">{item.desc}</span>
                  </div>
                </div>
              ))}
            </div>
          </div>
        )}
      </div>
    </div>
  );
}
