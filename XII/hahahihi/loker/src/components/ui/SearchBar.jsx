import React, { useState, useMemo } from 'react';
import { Search, X, MapPin, Key, Filter, Check } from 'lucide-react';

export function SearchBar({
  lockers = [],
  onSelectLocker,
  selectedIsland,
  onSelectIsland,
}) {
  const [searchTerm, setSearchTerm] = useState('');
  const [isFocused, setIsFocused] = useState(false);

  // Filtered matching lockers
  const filteredSuggestions = useMemo(() => {
    if (!searchTerm.trim()) return [];
    const term = searchTerm.toLowerCase().trim();
    return lockers
      .filter((item) => {
        const idMatch = item.No_Loker?.toLowerCase().includes(term);
        const codeMatch = item.Kode_Silinder?.toString().toLowerCase().includes(term);
        const noteMatch = item.Keterangan?.toLowerCase().includes(term);
        return idMatch || codeMatch || noteMatch;
      })
      .slice(0, 8); // Top 8 results
  }, [lockers, searchTerm]);

  const handleSelect = (locker) => {
    onSelectLocker(locker);
    setSearchTerm('');
    setIsFocused(false);
  };

  const islands = [
    { key: 'all', label: 'Semua Meja' },
    { key: '1', label: 'Meja 1 (A-B)' },
    { key: '2', label: 'Meja 2 (C-D)' },
    { key: '3', label: 'Meja 3 (E-F)' },
    { key: '4', label: 'Meja 4 (G-H)' },
  ];

  return (
    <div className="fixed top-28 sm:top-24 left-3 sm:left-4 z-20 w-72 sm:w-80">
      <div className="glass-panel rounded-2xl p-2.5 border border-white/10 shadow-2xl space-y-2">
        {/* Search Input Box */}
        <div className="relative">
          <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
            <Search className="w-4 h-4" />
          </div>
          <input
            type="text"
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            onFocus={() => setIsFocused(true)}
            placeholder="Cari No Loker / Kode Silinder..."
            className="w-full pl-9 pr-8 py-2 bg-slate-900/90 text-slate-100 placeholder-slate-400 text-xs rounded-xl border border-slate-700/80 focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all"
          />
          {searchTerm && (
            <button
              onClick={() => setSearchTerm('')}
              className="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-white"
            >
              <X className="w-4 h-4" />
            </button>
          )}
        </div>

        {/* Island Fast Filter Tabs */}
        <div className="flex items-center gap-1 overflow-x-auto scrollbar-none pb-0.5">
          {islands.map((isl) => (
            <button
              key={isl.key}
              onClick={() => onSelectIsland(isl.key)}
              className={`px-2 py-1 rounded-lg text-[11px] font-semibold whitespace-nowrap transition-all border ${
                selectedIsland === isl.key
                  ? 'bg-sky-500/20 text-sky-300 border-sky-400/40'
                  : 'text-slate-400 border-transparent hover:bg-slate-800 hover:text-slate-300'
              }`}
            >
              {isl.label}
            </button>
          ))}
        </div>

        {/* Autocomplete Suggestions Dropdown */}
        {isFocused && filteredSuggestions.length > 0 && (
          <div className="absolute top-full left-0 right-0 mt-2 bg-slate-900/95 backdrop-blur-xl rounded-xl border border-slate-700 shadow-2xl overflow-hidden z-30 divide-y divide-slate-800">
            {filteredSuggestions.map((locker) => (
              <button
                key={locker.No_Loker}
                onClick={() => handleSelect(locker)}
                className="w-full px-3 py-2 text-left hover:bg-slate-800/80 flex items-center justify-between transition-colors"
              >
                <div className="flex items-center gap-2">
                  <span className="font-extrabold text-xs text-sky-400 bg-sky-950/60 px-2 py-0.5 rounded border border-sky-800/60 font-mono">
                    {locker.No_Loker}
                  </span>
                  <div className="text-[11px]">
                    <div className="text-slate-200 font-medium flex items-center gap-1.5">
                      <span>Silinder:</span>
                      <span className="font-mono font-bold text-amber-300">
                        {locker.Kode_Silinder || '-'}
                      </span>
                    </div>
                    <div className="text-[10px] text-slate-400 truncate max-w-[170px]">
                      {locker.Keterangan}
                    </div>
                  </div>
                </div>
                <span
                  className={`text-[10px] font-semibold px-1.5 py-0.5 rounded ${
                    locker.Status_Kunci === 'Lengkap'
                      ? 'bg-emerald-500/20 text-emerald-300'
                      : locker.Status_Kunci === 'Kurang 1'
                      ? 'bg-amber-500/20 text-amber-300'
                      : 'bg-red-500/20 text-red-300'
                  }`}
                >
                  {locker.Status_Kunci}
                </span>
              </button>
            ))}
          </div>
        )}
      </div>
    </div>
  );
}
