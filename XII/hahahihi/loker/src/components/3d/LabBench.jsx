import React, { useMemo } from 'react';
import * as THREE from 'three';
import { LockerDoor } from './LockerDoor';
import { LabStool } from './LabStool';

export function LabBench({
  islandIndex, // 1, 2, 3, 4
  rowLeftName, // 'A', 'C', 'E', 'G'
  rowRightName, // 'B', 'D', 'F', 'H'
  position = [0, 0, 0],
  lockerMap = {}, // Map of id -> lockerData
  openLockers = {}, // Set or map of open locker IDs
  selectedLockerId = null,
  predictedHighlightRow = null, // e.g. 'E', 'F'
  neighborHighlightIds = [], // e.g. ['A4', 'H12']
  countertopTexture,
  woodTexture,
  onToggleOpen,
  onSelectLocker,
}) {
  const lockerWidth = 0.72;
  const lockerHeight = 0.76;
  const cabinetDepth = 0.46;
  const benchDepth = cabinetDepth * 2 + 0.04; // ~0.96m
  const numLockers = 12;
  const benchLength = numLockers * lockerWidth; // 8.64m
  const countertopWidth = benchDepth + 0.08; // 1.04m
  const countertopLength = benchLength + 0.28; // 8.92m
  const countertopHeight = 0.88;

  // Stool placement seed for realistic scattered look
  const stoolPlacements = useMemo(() => {
    const list = [];
    // Place ~7 stools on left and ~7 on right with natural slight offsets
    for (let i = 0; i < numLockers; i += 2) {
      const zBase = -((numLockers - 1) / 2) * lockerWidth + i * lockerWidth;
      // Left side stool
      list.push({
        x: -(benchDepth / 2 + 0.42 + (Math.sin(i * 1.7) * 0.08)),
        z: zBase + (Math.cos(i * 2.3) * 0.12),
        rot: Math.sin(i) * 0.5,
        type: i === 4 ? 'bench' : 'round'
      });
      // Right side stool
      list.push({
        x: benchDepth / 2 + 0.42 + (Math.cos(i * 1.5) * 0.08),
        z: zBase + 0.35 + (Math.sin(i * 1.9) * 0.1),
        rot: Math.cos(i) * 0.6,
        type: i === 8 ? 'bench' : 'round'
      });
    }
    return list;
  }, [numLockers, lockerWidth, benchDepth]);

  return (
    <group position={position}>
      {/* 1. Monolithic White-Tiled Countertop */}
      <mesh position={[0, countertopHeight - 0.02, 0]} castShadow receiveShadow>
        <boxGeometry args={[countertopWidth, 0.04, countertopLength]} />
        <meshStandardMaterial
          map={countertopTexture}
          color="#f8fafc"
          roughness={0.18}
          metalness={0.06}
        />
      </mesh>

      {/* Countertop Raised Spill Rim (Lip edges) */}
      {/* Left lip */}
      <mesh position={[-countertopWidth / 2 + 0.015, countertopHeight + 0.01, 0]} castShadow>
        <boxGeometry args={[0.03, 0.02, countertopLength]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.2} metalness={0.05} />
      </mesh>
      {/* Right lip */}
      <mesh position={[countertopWidth / 2 - 0.015, countertopHeight + 0.01, 0]} castShadow>
        <boxGeometry args={[0.03, 0.02, countertopLength]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.2} metalness={0.05} />
      </mesh>
      {/* Front lip */}
      <mesh position={[0, countertopHeight + 0.01, -countertopLength / 2 + 0.015]} castShadow>
        <boxGeometry args={[countertopWidth, 0.02, 0.03]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.2} metalness={0.05} />
      </mesh>
      {/* Rear lip */}
      <mesh position={[0, countertopHeight + 0.01, countertopLength / 2 - 0.015]} castShadow>
        <boxGeometry args={[countertopWidth, 0.02, 0.03]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.2} metalness={0.05} />
      </mesh>

      {/* 2. White Ceramic Tiled Side Casing / End Caps (Front & Rear) */}
      {/* Front End Cap */}
      <mesh position={[0, (countertopHeight - 0.04) / 2, -benchLength / 2 - 0.05]} castShadow receiveShadow>
        <boxGeometry args={[benchDepth, countertopHeight - 0.04, 0.1]} />
        <meshStandardMaterial
          map={countertopTexture}
          color="#f8fafc"
          roughness={0.22}
          metalness={0.05}
        />
      </mesh>
      {/* Rear End Cap */}
      <mesh position={[0, (countertopHeight - 0.04) / 2, benchLength / 2 + 0.05]} castShadow receiveShadow>
        <boxGeometry args={[benchDepth, countertopHeight - 0.04, 0.1]} />
        <meshStandardMaterial
          map={countertopTexture}
          color="#f8fafc"
          roughness={0.22}
          metalness={0.05}
        />
      </mesh>

      {/* 3. Central Spine Divider between back-to-back lockers */}
      <mesh position={[0, lockerHeight / 2, 0]}>
        <boxGeometry args={[0.04, lockerHeight, benchLength]} />
        <meshStandardMaterial color="#1e130b" roughness={0.8} />
      </mesh>

      {/* 4. Plinth / Toe Kick Base beneath lockers */}
      <mesh position={[0, 0.02, 0]} receiveShadow>
        <boxGeometry args={[benchDepth - 0.04, 0.04, benchLength]} />
        <meshStandardMaterial color="#18181b" roughness={0.8} />
      </mesh>

      {/* 5. Left Row Lockers (Facing -X: e.g. Row A, C, E, G) */}
      {Array.from({ length: numLockers }).map((_, idx) => {
        const number = idx + 1;
        const lockerId = `${rowLeftName}${number}`;
        const lockerData = lockerMap[lockerId] || {
          No_Loker: lockerId,
          Baris: rowLeftName,
          Nomor: number,
          Kode_Silinder: '-',
          Jumlah_Anak_Kunci: 0,
          Status_Silinder: 'Belum Dicek',
          Status_Kunci: 'Belum Dicek',
          Keterangan: ''
        };

        const zPos = -((numLockers - 1) / 2) * lockerWidth + idx * lockerWidth;
        const isPredicted = predictedHighlightRow === rowLeftName;
        const isNeighbor = neighborHighlightIds.includes(lockerId);

        return (
          <LockerDoor
            key={lockerId}
            lockerData={lockerData}
            isOpen={!!openLockers[lockerId]}
            isSelected={selectedLockerId === lockerId}
            isPredictedHighlight={isPredicted}
            isNeighborHighlight={isNeighbor}
            woodTexture={woodTexture}
            position={[-benchDepth / 4, 0.04, zPos]}
            facing={-1}
            width={lockerWidth}
            height={lockerHeight}
            depth={cabinetDepth}
            onToggleOpen={onToggleOpen}
            onSelect={onSelectLocker}
          />
        );
      })}

      {/* 6. Right Row Lockers (Facing +X: e.g. Row B, D, F, H) */}
      {Array.from({ length: numLockers }).map((_, idx) => {
        const number = idx + 1;
        const lockerId = `${rowRightName}${number}`;
        const lockerData = lockerMap[lockerId] || {
          No_Loker: lockerId,
          Baris: rowRightName,
          Nomor: number,
          Kode_Silinder: '-',
          Jumlah_Anak_Kunci: 0,
          Status_Silinder: 'Belum Dicek',
          Status_Kunci: 'Belum Dicek',
          Keterangan: ''
        };

        const zPos = -((numLockers - 1) / 2) * lockerWidth + idx * lockerWidth;
        const isPredicted = predictedHighlightRow === rowRightName;
        const isNeighbor = neighborHighlightIds.includes(lockerId);

        return (
          <LockerDoor
            key={lockerId}
            lockerData={lockerData}
            isOpen={!!openLockers[lockerId]}
            isSelected={selectedLockerId === lockerId}
            isPredictedHighlight={isPredicted}
            isNeighborHighlight={isNeighbor}
            woodTexture={woodTexture}
            position={[benchDepth / 4, 0.04, zPos]}
            facing={1}
            width={lockerWidth}
            height={lockerHeight}
            depth={cabinetDepth}
            onToggleOpen={onToggleOpen}
            onSelect={onSelectLocker}
          />
        );
      })}

      {/* 7. Scattered Lab Stools along this island */}
      {stoolPlacements.map((stool, sIdx) => (
        <LabStool
          key={`stool-${sIdx}`}
          position={[stool.x, 0, stool.z]}
          rotation={[0, stool.rot, 0]}
          type={stool.type}
        />
      ))}
    </group>
  );
}
