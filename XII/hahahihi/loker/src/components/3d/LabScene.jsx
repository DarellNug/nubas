import React, { useMemo } from 'react';
import { LabRoom } from './LabRoom';
import { LabBench } from './LabBench';
import { Lighting } from './Lighting';
import { CameraController } from './CameraController';
import {
  createFloorTileTexture,
  createCountertopTileTexture,
  createWoodLaminateTexture,
} from '../../utils/textureGenerator';

export function LabScene({
  lockerMap = {},
  openLockers = {},
  selectedLocker = null,
  predictedHighlightRow = null,
  neighborHighlightIds = [],
  activeCameraPreset = 'overview',
  focusedLockerId = null,
  onToggleOpen,
  onSelectLocker,
  onUserInteracted,
}) {
  // Shared textures initialized once
  const floorTexture = useMemo(() => createFloorTileTexture(), []);
  const countertopTexture = useMemo(() => createCountertopTileTexture(), []);
  const woodTexture = useMemo(() => createWoodLaminateTexture(), []);

  return (
    <>
      {/* Dynamic Cinematic Lab Lighting */}
      <Lighting />

      {/* Camera Controller with Presets & Locker Lerp */}
      <CameraController
        activePreset={activeCameraPreset}
        focusedLockerId={focusedLockerId}
        onUserInteracted={onUserInteracted}
      />

      {/* 1:1 Architectural Environment Room */}
      <LabRoom floorTexture={floorTexture} />

      {/* The 4 Monolithic Parallel Laboratory Island Benches */}
      {/* Island 1 (Paling Kiri, dekat dinding kiri): Row A (luar) & Row B (dalam) */}
      <LabBench
        islandIndex={1}
        rowLeftName="A"
        rowRightName="B"
        position={[-2.7, 0, 0]}
        lockerMap={lockerMap}
        openLockers={openLockers}
        selectedLockerId={selectedLocker?.No_Loker}
        predictedHighlightRow={predictedHighlightRow}
        neighborHighlightIds={neighborHighlightIds}
        countertopTexture={countertopTexture}
        woodTexture={woodTexture}
        onToggleOpen={onToggleOpen}
        onSelectLocker={onSelectLocker}
      />

      {/* Island 2 (Meja Kedua): Row C & Row D */}
      <LabBench
        islandIndex={2}
        rowLeftName="C"
        rowRightName="D"
        position={[-0.9, 0, 0]}
        lockerMap={lockerMap}
        openLockers={openLockers}
        selectedLockerId={selectedLocker?.No_Loker}
        predictedHighlightRow={predictedHighlightRow}
        neighborHighlightIds={neighborHighlightIds}
        countertopTexture={countertopTexture}
        woodTexture={woodTexture}
        onToggleOpen={onToggleOpen}
        onSelectLocker={onSelectLocker}
      />

      {/* Island 3 (Meja Ketiga): Row E & Row F */}
      <LabBench
        islandIndex={3}
        rowLeftName="E"
        rowRightName="F"
        position={[0.9, 0, 0]}
        lockerMap={lockerMap}
        openLockers={openLockers}
        selectedLockerId={selectedLocker?.No_Loker}
        predictedHighlightRow={predictedHighlightRow}
        neighborHighlightIds={neighborHighlightIds}
        countertopTexture={countertopTexture}
        woodTexture={woodTexture}
        onToggleOpen={onToggleOpen}
        onSelectLocker={onSelectLocker}
      />

      {/* Island 4 (Paling Kanan, dekat deretan jendela berjalusi): Row G & Row H */}
      <LabBench
        islandIndex={4}
        rowLeftName="G"
        rowRightName="H"
        position={[2.7, 0, 0]}
        lockerMap={lockerMap}
        openLockers={openLockers}
        selectedLockerId={selectedLocker?.No_Loker}
        predictedHighlightRow={predictedHighlightRow}
        neighborHighlightIds={neighborHighlightIds}
        countertopTexture={countertopTexture}
        woodTexture={woodTexture}
        onToggleOpen={onToggleOpen}
        onSelectLocker={onSelectLocker}
      />
    </>
  );
}
