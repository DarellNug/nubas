import React from 'react';
import {
  Compass,
  Video,
  LayoutGrid,
  Maximize2,
  Columns3,
  Building2,
} from 'lucide-react';
import { CAMERA_PRESETS } from '../3d/CameraController';

export function CameraPresetsBar({
  activePreset,
  onSelectPreset,
}) {
  const presetItems = [
    { key: 'overview', icon: LayoutGrid, short: 'Overview', desc: 'Isometrik Atas' },
    { key: 'front', icon: Building2, short: 'Depan', desc: 'Pintu Masuk' },
    { key: 'meja1', icon: Columns3, short: 'Meja 1', desc: 'Row A & B' },
    { key: 'meja2', icon: Columns3, short: 'Meja 2', desc: 'Row C & D' },
    { key: 'meja3', icon: Columns3, short: 'Meja 3', desc: 'Row E & F' },
    { key: 'meja4', icon: Columns3, short: 'Meja 4', desc: 'Row G & H' },
  ];

  return (
    <div className="fixed bottom-4 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
      <div className="glass-panel rounded-2xl p-1.5 flex items-center gap-1 sm:gap-2 pointer-events-auto border border-white/10 shadow-2xl">
        <div className="px-2 hidden md:flex items-center gap-1.5 text-xs font-bold text-slate-400 border-r border-slate-700/60 pr-3">
          <Video className="w-3.5 h-3.5 text-sky-400" />
          <span>Kamera</span>
        </div>

        {presetItems.map((item) => {
          const Icon = item.icon;
          const isActive = activePreset === item.key;
          return (
            <button
              key={item.key}
              onClick={() => onSelectPreset(item.key)}
              className={`px-3 py-1.5 rounded-xl transition-all flex flex-col items-center justify-center min-w-[62px] sm:min-w-[76px] ${
                isActive
                  ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/30 scale-105'
                  : 'text-slate-400 hover:text-white hover:bg-slate-800/80'
              }`}
            >
              <div className="flex items-center gap-1">
                <Icon className={`w-3.5 h-3.5 ${isActive ? 'text-white' : 'text-slate-400'}`} />
                <span className="text-xs font-bold">{item.short}</span>
              </div>
              <span className={`text-[9px] ${isActive ? 'text-sky-100 font-medium' : 'text-slate-500'}`}>
                {item.desc}
              </span>
            </button>
          );
        })}
      </div>
    </div>
  );
}
