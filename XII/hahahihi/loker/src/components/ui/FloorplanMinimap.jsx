import React from 'react';
import { Layers, MapPin, X } from 'lucide-react';

export function FloorplanMinimap({
  lockerMap = {},
  selectedLockerId = null,
  onSelectLocker,
  onClose,
}) {
  // Helper to color dots based on locker condition
  const getDotColor = (locker) => {
    if (!locker) return '#64748b';
    if (locker.Status_Silinder === 'Macet Oksidasi') return '#f97316';
    if (locker.Status_Silinder === 'Hilang') return '#ef4444';
    if (locker.Status_Kunci === 'Dipegang Ganda') return '#06b6d4';
    if (locker.Status_Kunci === 'Kurang 1') return '#f59e0b';
    if (locker.Status_Kunci === 'Tidak Ada') return '#dc2626';
    if (locker.Status_Kunci === 'Lengkap') return '#10b981';
    return '#94a3b8';
  };

  const islands = [
    { name: 'Meja 1', rowLeft: 'A', rowRight: 'B', xOffset: 28 },
    { name: 'Meja 2', rowLeft: 'C', rowRight: 'D', xOffset: 72 },
    { name: 'Meja 3', rowLeft: 'E', rowRight: 'F', xOffset: 128 },
    { name: 'Meja 4', rowLeft: 'G', rowRight: 'H', xOffset: 172 },
  ];

  return (
    <div className="fixed bottom-20 sm:bottom-4 left-3 sm:left-4 z-20 w-64 sm:w-72 pointer-events-none">
      <div className="glass-panel rounded-2xl border border-white/10 shadow-2xl p-3 pointer-events-auto transition-all animate-in fade-in duration-300">
        {/* Header */}
        <div className="flex items-center justify-between pb-2 border-b border-slate-700/60 mb-2">
          <div className="flex items-center gap-1.5 text-xs font-bold text-white">
            <Layers className="w-3.5 h-3.5 text-sky-400" />
            <span>DENAH 2D LAB (MINIMAP)</span>
          </div>
          <button
            onClick={onClose}
            className="text-slate-400 hover:text-white p-0.5 rounded-lg"
          >
            <X className="w-3.5 h-3.5" />
          </button>
        </div>

        {/* 2D SVG Lab Floorplan */}
        <div className="relative bg-slate-950/80 rounded-xl p-2 border border-slate-800">
          <svg
            viewBox="0 0 220 300"
            className="w-full h-auto select-none"
            style={{ maxHeight: '250px' }}
          >
            {/* Lab Room Outer Walls (14m x 8m) */}
            <rect
              x="5"
              y="5"
              width="210"
              height="290"
              fill="none"
              stroke="#475569"
              strokeWidth="2"
              rx="4"
            />

            {/* Front Wall Annotations (Papan Tulis & Meja Guru) */}
            <rect x="50" y="5" width="80" height="4" fill="#38bdf8" />
            <text x="90" y="16" fill="#94a3b8" fontSize="6" textAnchor="middle" fontWeight="bold">
              PAPAN TULIS & GARUDA
            </text>
            <rect x="15" y="8" width="22" height="14" fill="#78350f" rx="1" />
            <text x="26" y="17" fill="#fde68a" fontSize="4.5" textAnchor="middle">
              MEJA GURU
            </text>

            {/* Right Wall Windows (Jalusi) */}
            <line x1="215" y1="30" x2="215" y2="260" stroke="#bae6fd" strokeWidth="4" strokeDasharray="6,4" />
            <text x="210" y="145" fill="#7dd3fc" fontSize="5" textAnchor="middle" transform="rotate(90, 210, 145)">
              JENDELA JALUSI
            </text>

            {/* Central Square Concrete Pillar with Blue Wall Clock */}
            <rect x="100" y="90" width="16" height="16" fill="#f8fafc" stroke="#64748b" strokeWidth="1" />
            <circle cx="108" cy="90" r="3.5" fill="#1e3a8a" />
            <text x="108" y="116" fill="#cbd5e1" fontSize="4.5" textAnchor="middle" fontWeight="bold">
              PILAR / JAM
            </text>

            {/* Left Wall Notice Boards */}
            <line x1="5" y1="80" x2="5" y2="130" stroke="#facc15" strokeWidth="3" />
            <text x="12" y="105" fill="#facc15" fontSize="4.5" textAnchor="middle" transform="rotate(-90, 12, 105)">
              PAPAN K3
            </text>

            {/* Rear Glass Enclosure (Partisi Kaca) */}
            <rect x="135" y="245" width="75" height="48" fill="rgba(56, 189, 248, 0.1)" stroke="#0284c7" strokeWidth="1.5" strokeDasharray="3,2" />
            <text x="172" y="272" fill="#7dd3fc" fontSize="5" textAnchor="middle">
              PARTISI KACA
            </text>

            {/* The 4 Island Benches */}
            {islands.map((isl, idx) => (
              <g key={idx}>
                {/* Bench Countertop Outline */}
                <rect
                  x={isl.xOffset}
                  y="36"
                  width="20"
                  height="198"
                  fill="#1e293b"
                  stroke="#64748b"
                  strokeWidth="1"
                  rx="2"
                />

                <text
                  x={isl.xOffset + 10}
                  y="32"
                  fill="#94a3b8"
                  fontSize="5.5"
                  textAnchor="middle"
                  fontWeight="bold"
                >
                  {isl.name}
                </text>

                {/* 12 Lockers on Left Row */}
                {Array.from({ length: 12 }).map((_, lIdx) => {
                  const lockerId = `${isl.rowLeft}${lIdx + 1}`;
                  const locker = lockerMap[lockerId];
                  const isSelected = selectedLockerId === lockerId;
                  const cy = 44 + lIdx * 16.5;
                  const cx = isl.xOffset + 4;
                  const color = getDotColor(locker);

                  return (
                    <g
                      key={lockerId}
                      className="cursor-pointer group"
                      onClick={() => onSelectLocker(locker || { No_Loker: lockerId })}
                    >
                      <circle
                        cx={cx}
                        cy={cy}
                        r={isSelected ? 4.5 : 2.8}
                        fill={color}
                        stroke={isSelected ? '#38bdf8' : '#0f172a'}
                        strokeWidth={isSelected ? 1.5 : 0.8}
                      />
                      {isSelected && (
                        <circle
                          cx={cx}
                          cy={cy}
                          r={6.5}
                          fill="none"
                          stroke="#38bdf8"
                          strokeWidth="1"
                          strokeDasharray="2,2"
                        />
                      )}
                    </g>
                  );
                })}

                {/* 12 Lockers on Right Row */}
                {Array.from({ length: 12 }).map((_, rIdx) => {
                  const lockerId = `${isl.rowRight}${rIdx + 1}`;
                  const locker = lockerMap[lockerId];
                  const isSelected = selectedLockerId === lockerId;
                  const cy = 44 + rIdx * 16.5;
                  const cx = isl.xOffset + 16;
                  const color = getDotColor(locker);

                  return (
                    <g
                      key={lockerId}
                      className="cursor-pointer group"
                      onClick={() => onSelectLocker(locker || { No_Loker: lockerId })}
                    >
                      <circle
                        cx={cx}
                        cy={cy}
                        r={isSelected ? 4.5 : 2.8}
                        fill={color}
                        stroke={isSelected ? '#38bdf8' : '#0f172a'}
                        strokeWidth={isSelected ? 1.5 : 0.8}
                      />
                      {isSelected && (
                        <circle
                          cx={cx}
                          cy={cy}
                          r={6.5}
                          fill="none"
                          stroke="#38bdf8"
                          strokeWidth="1"
                          strokeDasharray="2,2"
                        />
                      )}
                    </g>
                  );
                })}
              </g>
            ))}
          </svg>
        </div>

        <p className="text-[10px] text-slate-400 text-center mt-1.5">
          Klik titik loker untuk navigasi & fokus 3D
        </p>
      </div>
    </div>
  );
}
