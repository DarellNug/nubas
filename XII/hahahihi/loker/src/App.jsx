import React, { useState, useEffect, useMemo, Suspense } from 'react';
import { Canvas } from '@react-three/fiber';
import Papa from 'papaparse';
import { LabScene } from './components/3d/LabScene';
import { Header } from './components/ui/Header';
import { CameraPresetsBar } from './components/ui/CameraPresetsBar';
import { SearchBar } from './components/ui/SearchBar';
import { KunciBebasDock } from './components/ui/KunciBebasDock';
import { LockerModal } from './components/ui/LockerModal';
import { FloorplanMinimap } from './components/ui/FloorplanMinimap';
import { LegendBar } from './components/ui/LegendBar';
import { playKeyInspectSound } from './utils/audio';

export default function App() {
  const [rawData, setRawData] = useState([]);
  const [lockers, setLockers] = useState([]);
  const [unassignedKeys, setUnassignedKeys] = useState([]);
  const [openLockers, setOpenLockers] = useState({});
  const [selectedLocker, setSelectedLocker] = useState(null);
  const [activeCameraPreset, setActiveCameraPreset] = useState('overview');
  const [focusedLockerId, setFocusedLockerId] = useState(null);
  const [isPredicting, setIsPredicting] = useState(false);
  const [activeFilter, setActiveFilter] = useState('all');
  const [selectedIsland, setSelectedIsland] = useState('all');
  const [showMinimap, setShowMinimap] = useState(true);
  const [loading, setLoading] = useState(true);

  // 1. Dynamic Data Ingestion from /loker.csv
  useEffect(() => {
    Papa.parse('/loker.csv', {
      download: true,
      header: true,
      dynamicTyping: true,
      skipEmptyLines: true,
      complete: (results) => {
        if (results.data && Array.isArray(results.data)) {
          setRawData(results.data);

          // Separate unassigned keys (Baris === "-") and regular lockers
          const regular = [];
          const unassigned = [];

          results.data.forEach((row) => {
            if (!row.No_Loker) return;
            if (row.Baris === '-' || !row.Baris) {
              unassigned.push(row);
            } else {
              regular.push(row);
            }
          });

          setLockers(regular);
          setUnassignedKeys(unassigned);
          setLoading(false);
        }
      },
      error: (err) => {
        console.error('Error loading /loker.csv:', err);
        setLoading(false);
      }
    });
  }, []);

  // Map of lockerId -> locker object for O(1) lookup
  const lockerMap = useMemo(() => {
    const map = {};
    lockers.forEach((item) => {
      if (item.No_Loker) {
        map[item.No_Loker] = item;
      }
    });
    return map;
  }, [lockers]);

  // Dynamic KPIs computed live from parsed CSV data
  const kpis = useMemo(() => {
    let lengkap = 0;
    let kurang1 = 0;
    let tidakAda = 0;
    let silinderHilang = 0;
    let macetOksidasi = 0;
    let belumDicek = 0;
    let diGanda = 0;

    lockers.forEach((item) => {
      const cStat = item.Status_Silinder;
      const kStat = item.Status_Kunci;

      if (cStat === 'Hilang') {
        silinderHilang++;
      } else if (cStat === 'Macet Oksidasi') {
        macetOksidasi++;
      }

      if (kStat === 'Lengkap') lengkap++;
      else if (kStat === 'Kurang 1') kurang1++;
      else if (kStat === 'Tidak Ada') tidakAda++;
      else if (kStat === 'Dipegang Ganda') diGanda++;
      else if (kStat === 'Belum Dicek' || cStat === 'Belum Dicek') belumDicek++;
    });

    return {
      total: lockers.length,
      lengkap,
      kurang1,
      tidakAda,
      silinderHilang,
      macetOksidasi,
      belumDicek,
      diGanda,
      unassigned: unassignedKeys.length,
    };
  }, [lockers, unassignedKeys]);

  // Toggle open/close door for a specific locker
  const handleToggleDoor = (lockerId) => {
    setOpenLockers((prev) => ({
      ...prev,
      [lockerId]: !prev[lockerId],
    }));
  };

  // Select locker from 3D click, search, or minimap
  const handleSelectLocker = (locker) => {
    if (!locker) return;
    const fullLocker = lockerMap[locker.No_Loker] || locker;
    setSelectedLocker(fullLocker);
    setFocusedLockerId(locker.No_Loker);
    playKeyInspectSound();
  };

  // Switch camera preset
  const handleSelectPreset = (presetKey) => {
    setActiveCameraPreset(presetKey);
    setFocusedLockerId(null);
  };

  // Reset camera to overview
  const handleResetCamera = () => {
    setActiveCameraPreset('overview');
    setFocusedLockerId(null);
    setSelectedLocker(null);
  };

  // When user drags / orbits camera manually
  const handleUserInteracted = () => {
    setActiveCameraPreset(null);
    setFocusedLockerId(null);
  };

  // Toggle prediction radar for Kunci Bebas
  const handleTogglePrediction = () => {
    setIsPredicting((prev) => !prev);
    if (!isPredicting) {
      // Zoom camera to Meja 3 (Island 3 Rows E & F)
      setActiveCameraPreset('meja3');
      setFocusedLockerId(null);
    }
  };

  // Focus directly on a specific neighbor locker
  const handleFocusNeighbor = (lockerId) => {
    const target = lockerMap[lockerId];
    if (target) {
      handleSelectLocker(target);
    }
  };

  // Filtered lockers for SearchBar or table
  const filteredLockers = useMemo(() => {
    return lockers.filter((item) => {
      // Island filter
      if (selectedIsland === '1' && !['A', 'B'].includes(item.Baris)) return false;
      if (selectedIsland === '2' && !['C', 'D'].includes(item.Baris)) return false;
      if (selectedIsland === '3' && !['E', 'F'].includes(item.Baris)) return false;
      if (selectedIsland === '4' && !['G', 'H'].includes(item.Baris)) return false;

      // Status filter
      if (activeFilter === 'all') return true;
      if (activeFilter === 'Lengkap') return item.Status_Kunci === 'Lengkap';
      if (activeFilter === 'Kurang 1') return item.Status_Kunci === 'Kurang 1';
      if (activeFilter === 'Tidak Ada') return item.Status_Kunci === 'Tidak Ada';
      if (activeFilter === 'Silinder Hilang') return item.Status_Silinder === 'Hilang';
      if (activeFilter === 'Macet Oksidasi') return item.Status_Silinder === 'Macet Oksidasi';
      if (activeFilter === 'Dipegang Ganda') return item.Status_Kunci === 'Dipegang Ganda';
      if (activeFilter === 'Belum Dicek')
        return item.Status_Kunci === 'Belum Dicek' || item.Status_Silinder === 'Belum Dicek';

      return true;
    });
  }, [lockers, selectedIsland, activeFilter]);

  return (
    <div className="relative w-screen h-screen overflow-hidden bg-slate-950">
      {/* 1. Header & Dynamic KPI Dashboard */}
      <Header
        kpis={kpis}
        onResetCamera={handleResetCamera}
        activeFilter={activeFilter}
        onFilterChange={setActiveFilter}
        showMinimap={showMinimap}
        onToggleMinimap={() => setShowMinimap(!showMinimap)}
      />

      {/* 2. Global Search & Island Filter Bar */}
      <SearchBar
        lockers={lockers}
        onSelectLocker={handleSelectLocker}
        selectedIsland={selectedIsland}
        onSelectIsland={setSelectedIsland}
      />

      {/* 3. 3D Status Legend Bar */}
      {!selectedLocker && <LegendBar />}

      {/* 4. Three.js R3F Canvas */}
      <div className="w-full h-full">
        <Canvas
          shadows
          gl={{
            antialias: true,
            alpha: false,
            powerPreference: 'high-performance',
          }}
          camera={{
            position: [7.8, 6.8, 8.2],
            fov: 45,
            near: 0.1,
            far: 50,
          }}
        >
          <Suspense fallback={null}>
            <LabScene
              lockerMap={lockerMap}
              openLockers={openLockers}
              selectedLocker={selectedLocker}
              predictedHighlightRow={isPredicting ? 'E' : null}
              neighborHighlightIds={isPredicting ? ['A4', 'H12'] : []}
              activeCameraPreset={activeCameraPreset}
              focusedLockerId={focusedLockerId}
              onToggleOpen={handleToggleDoor}
              onSelectLocker={handleSelectLocker}
              onUserInteracted={handleUserInteracted}
            />
          </Suspense>
        </Canvas>
      </div>

      {/* 5. Camera Presets Quick Bar (Bottom Center) */}
      <CameraPresetsBar
        activePreset={activeCameraPreset}
        onSelectPreset={handleSelectPreset}
      />

      {/* 6. Floating Kunci Bebas Dock (Bottom Right) */}
      <KunciBebasDock
        unassignedKeys={unassignedKeys}
        isPredicting={isPredicting}
        onTogglePrediction={handleTogglePrediction}
        onFocusLocker={handleFocusNeighbor}
      />

      {/* 7. Locker Detail Inspection Drawer / Modal */}
      {selectedLocker && (
        <LockerModal
          locker={selectedLocker}
          isOpen={!!openLockers[selectedLocker.No_Loker]}
          allLockers={lockers}
          onClose={() => setSelectedLocker(null)}
          onToggleDoor={handleToggleDoor}
          onFocusLocker={handleSelectLocker}
          onNavigateLocker={handleSelectLocker}
        />
      )}

      {/* 8. 2D Interactive Lab Floorplan (Minimap) */}
      {showMinimap && (
        <FloorplanMinimap
          lockerMap={lockerMap}
          selectedLockerId={selectedLocker?.No_Loker}
          onSelectLocker={handleSelectLocker}
          onClose={() => setShowMinimap(false)}
        />
      )}

      {/* Loading Overlay */}
      {loading && (
        <div className="absolute inset-0 z-50 flex items-center justify-center bg-slate-950/90 backdrop-blur-md">
          <div className="flex flex-col items-center gap-3">
            <div className="w-10 h-10 border-4 border-sky-500/30 border-t-sky-500 rounded-full animate-spin" />
            <span className="text-sm font-bold text-slate-300">
              Memuat Data /loker.csv & Model 3D Lab...
            </span>
          </div>
        </div>
      )}
    </div>
  );
}
