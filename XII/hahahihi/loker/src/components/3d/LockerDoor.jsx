import React, { useRef, useState, useMemo } from 'react';
import { useFrame } from '@react-three/fiber';
import { Html, Text } from '@react-three/drei';
import * as THREE from 'three';
import { playDoorOpenSound, playDoorCloseSound } from '../../utils/audio';

// Helper to create procedural rust texture for oxidised cylinder (A6)
function createRustTexture() {
  const canvas = document.createElement('canvas');
  canvas.width = 128;
  canvas.height = 128;
  const ctx = canvas.getContext('2d');

  // Rust base
  ctx.fillStyle = '#7c2d12';
  ctx.fillRect(0, 0, 128, 128);

  // Orange-brown rusted iron flakes
  for (let i = 0; i < 300; i++) {
    const x = Math.random() * 128;
    const y = Math.random() * 128;
    const size = 1 + Math.random() * 4;
    ctx.fillStyle = Math.random() > 0.4 ? '#ea580c' : '#b45309';
    ctx.fillRect(x, y, size, size);
  }

  // Dark pitting
  for (let i = 0; i < 150; i++) {
    const x = Math.random() * 128;
    const y = Math.random() * 128;
    ctx.fillStyle = 'rgba(20, 10, 5, 0.7)';
    ctx.fillRect(x, y, 1.5, 1.5);
  }

  const texture = new THREE.CanvasTexture(canvas);
  return texture;
}

export function LockerDoor({
  lockerData,
  isOpen = false,
  isSelected = false,
  isPredictedHighlight = false,
  isNeighborHighlight = false,
  woodTexture,
  position = [0, 0, 0],
  facing = 1, // 1: facing +X (side B, D, F, H), -1: facing -X (side A, C, E, G)
  width = 0.72,
  height = 0.76,
  depth = 0.46,
  onToggleOpen,
  onSelect,
}) {
  const hingeRef = useRef();
  const [hovered, setHovered] = useState(false);
  const currentAngle = useRef(0);
  const pulseRef = useRef(0);

  const rustTexture = useMemo(() => createRustTexture(), []);

  // Determine status colors and conditions based on CSV fields
  const cylinderStatus = lockerData?.Status_Silinder || 'Belum Dicek';
  const keyStatus = lockerData?.Status_Kunci || 'Belum Dicek';
  const isHilang = cylinderStatus === 'Hilang';
  const isMacet = cylinderStatus === 'Macet Oksidasi';
  const isBelumDicek = cylinderStatus === 'Belum Dicek';
  const isGanda = keyStatus === 'Dipegang Ganda';
  const isKurang = keyStatus === 'Kurang 1';
  const isTidakAda = keyStatus === 'Tidak Ada';
  const isLengkap = keyStatus === 'Lengkap';

  // Status Pin Indicator Color
  const pinColor = useMemo(() => {
    if (isMacet) return '#f97316'; // orange-rust
    if (isHilang) return '#ef4444'; // red
    if (isGanda) return '#06b6d4'; // cyan
    if (isKurang) return '#f59e0b'; // amber
    if (isTidakAda) return '#dc2626'; // crimson red
    if (isLengkap) return '#10b981'; // emerald green
    return '#94a3b8'; // desaturated grey
  }, [isMacet, isHilang, isGanda, isKurang, isTidakAda, isLengkap]);

  // Smooth door rotation animation in useFrame
  useFrame((state, delta) => {
    // Target rotation: when open, swings 70 deg (1.22 radians) outward
    const targetAngle = isOpen ? (facing === 1 ? 1.22 : -1.22) : 0;
    currentAngle.current = THREE.MathUtils.damp(currentAngle.current, targetAngle, 8, delta);
    if (hingeRef.current) {
      hingeRef.current.rotation.y = currentAngle.current;
    }

    // Pulse animation for predicted target locker or neighbor
    if (isPredictedHighlight || isNeighborHighlight || isMacet) {
      pulseRef.current += delta * 4;
    }
  });

  const handleClick = (e) => {
    e.stopPropagation();
    if (isOpen) {
      playDoorCloseSound();
    } else {
      playDoorOpenSound();
    }
    if (onToggleOpen) onToggleOpen(lockerData?.No_Loker);
    if (onSelect) onSelect(lockerData);
  };

  const doorThickness = 0.022;
  const hingeOffsetX = facing === 1 ? width / 2 : -width / 2;

  // Pulse intensity for prediction highlight
  const pulseScale = isPredictedHighlight || isNeighborHighlight
    ? 1 + Math.sin(pulseRef.current) * 0.08
    : 1;

  return (
    <group position={position}>
      {/* Cabinet Interior Casing & Shelf (Static) */}
      <mesh position={[0, height / 2, 0]} receiveShadow>
        <boxGeometry args={[depth, height - 0.02, width - 0.02]} />
        <meshStandardMaterial
          color="#2a180d"
          roughness={0.7}
          metalness={0.05}
        />
      </mesh>

      {/* Interior Cabinet Shelf Divider */}
      <mesh position={[0, height / 2, 0]}>
        <boxGeometry args={[depth - 0.04, 0.02, width - 0.04]} />
        <meshStandardMaterial color="#351e10" roughness={0.6} />
      </mesh>

      {/* Interior Subtle Ambient Glow when door opens */}
      {isOpen && (
        <pointLight
          position={[0, height / 2, 0]}
          color="#ffeedd"
          intensity={0.4}
          distance={1.2}
        />
      )}

      {/* Door Hinge Anchor (Rotates around vertical hinge side) */}
      <group
        position={[
          facing * (depth / 2),
          0,
          hingeOffsetX
        ]}
      >
        <group ref={hingeRef}>
          {/* Main Wooden Locker Door Panel */}
          <mesh
            position={[
              0,
              height / 2,
              -hingeOffsetX
            ]}
            castShadow
            receiveShadow
            onClick={handleClick}
            onPointerOver={(e) => {
              e.stopPropagation();
              setHovered(true);
              document.body.style.cursor = 'pointer';
            }}
            onPointerOut={(e) => {
              e.stopPropagation();
              setHovered(false);
              document.body.style.cursor = 'default';
            }}
          >
            <boxGeometry args={[doorThickness, height - 0.015, width - 0.015]} />
            <meshStandardMaterial
              map={woodTexture}
              color={
                isSelected
                  ? '#a06030'
                  : hovered
                  ? '#6a3d24'
                  : isPredictedHighlight
                  ? '#8b5a2b'
                  : '#452618'
              }
              roughness={0.4}
              metalness={0.05}
            />

            {/* Embossed Metallic Locker Number Plate */}
            <group position={[facing * (doorThickness / 2 + 0.003), height * 0.32, 0]}>
              <mesh castShadow>
                <boxGeometry args={[0.004, 0.07, 0.16]} />
                <meshStandardMaterial
                  color="#d4d4d8"
                  metalness={0.85}
                  roughness={0.25}
                />
              </mesh>
              {/* Embossed Locker ID Text */}
              <Text
                position={[facing * 0.004, 0, 0]}
                rotation={[0, facing === 1 ? Math.PI / 2 : -Math.PI / 2, 0]}
                fontSize={0.042}
                color="#09090b"
                fontWeight="bold"
                anchorX="center"
                anchorY="middle"
              >
                {lockerData?.No_Loker || ''}
              </Text>
            </group>

            {/* Cylinder & Keyhole Hardware Assembly at Top Edge */}
            <group position={[facing * (doorThickness / 2 + 0.002), height * 0.38, facing * (width * 0.28)]}>
              {isHilang ? (
                // 🕳️ Silinder Hilang: Visible empty drilled circular hole
                <mesh rotation={[0, 0, Math.PI / 2]}>
                  <cylinderGeometry args={[0.022, 0.022, doorThickness + 0.01, 24]} />
                  <meshBasicMaterial color="#0a0a0a" />
                </mesh>
              ) : (
                // Present Cylinder
                <group>
                  {/* Outer Bezel */}
                  <mesh rotation={[0, 0, Math.PI / 2]} castShadow>
                    <cylinderGeometry args={[0.024, 0.024, 0.01, 24]} />
                    {isMacet ? (
                      // 🟤 Macet Oksidasi: Procedural rough rust texture + high roughness
                      <meshStandardMaterial
                        map={rustTexture}
                        color="#a0522d"
                        roughness={0.92}
                        metalness={0.3}
                      />
                    ) : isBelumDicek ? (
                      // ⚪ Belum Dicek: Desaturated matte grey
                      <meshStandardMaterial
                        color="#71717a"
                        roughness={0.6}
                        metalness={0.4}
                      />
                    ) : (
                      // 🟢 Polished Chrome Cylinder
                      <meshStandardMaterial
                        color="#f1f5f9"
                        roughness={0.15}
                        metalness={0.92}
                      />
                    )}
                  </mesh>

                  {/* Inner Cylinder Core with Keyhole Slit */}
                  <mesh
                    position={[facing * 0.006, 0, 0]}
                    rotation={[0, 0, Math.PI / 2]}
                  >
                    <cylinderGeometry args={[0.015, 0.015, 0.005, 20]} />
                    <meshStandardMaterial
                      color={isMacet ? '#5c2a12' : '#334155'}
                      roughness={isMacet ? 0.95 : 0.3}
                      metalness={0.8}
                    />
                  </mesh>

                  {/* Keyhole slot */}
                  <mesh position={[facing * 0.009, 0, 0]}>
                    <boxGeometry args={[0.002, 0.016, 0.004]} />
                    <meshBasicMaterial color="#050505" />
                  </mesh>
                </group>
              )}

              {/* Status Indicator LED Pin */}
              <group position={[0, -0.045, 0]}>
                <mesh rotation={[0, 0, Math.PI / 2]}>
                  <cylinderGeometry args={[0.008, 0.008, 0.005, 16]} />
                  <meshBasicMaterial color={pinColor} />
                </mesh>
                {/* Subtle Glow Ring */}
                <pointLight
                  color={pinColor}
                  intensity={isSelected ? 0.8 : hovered ? 0.4 : 0.15}
                  distance={0.3}
                />
              </group>

              {/* Pulsing Alert Ring for Macet Oksidasi (e.g. A6) */}
              {isMacet && (
                <mesh
                  position={[facing * 0.012, 0, 0]}
                  rotation={[0, 0, Math.PI / 2]}
                  scale={[pulseScale, pulseScale, 1]}
                >
                  <ringGeometry args={[0.028, 0.035, 24]} />
                  <meshBasicMaterial
                    color="#f97316"
                    transparent
                    opacity={0.85}
                    side={THREE.DoubleSide}
                  />
                </mesh>
              )}
            </group>

            {/* Selection / Hover Glowing Outline Frame */}
            {(isSelected || hovered || isPredictedHighlight || isNeighborHighlight) && (
              <lineSegments position={[facing * 0.012, 0, 0]}>
                <edgesGeometry
                  args={[new THREE.BoxGeometry(doorThickness + 0.005, height - 0.01, width - 0.01)]}
                />
                <lineBasicMaterial
                  color={
                    isSelected
                      ? '#38bdf8'
                      : isPredictedHighlight
                      ? '#fbbf24'
                      : isNeighborHighlight
                      ? '#a855f7'
                      : '#60a5fa'
                  }
                  linewidth={2}
                />
              </lineSegments>
            )}

            {/* Prediction Label Badge in 3D when Kunci Bebas pulse is active */}
            {isPredictedHighlight && (
              <Html
                position={[facing * 0.15, height * 0.2, 0]}
                center
                distanceFactor={7}
                zIndexRange={[100, 0]}
              >
                <div className="px-2 py-0.5 bg-amber-500/90 text-slate-950 font-bold text-xs rounded shadow-lg whitespace-nowrap animate-bounce flex items-center gap-1 border border-amber-300">
                  <span>🎯 Target Prediksi</span>
                </div>
              </Html>
            )}

            {isNeighborHighlight && (
              <Html
                position={[facing * 0.15, height * 0.2, 0]}
                center
                distanceFactor={7}
                zIndexRange={[100, 0]}
              >
                <div className="px-2 py-0.5 bg-purple-600/90 text-white font-bold text-xs rounded shadow-lg whitespace-nowrap animate-pulse flex items-center gap-1 border border-purple-400">
                  <span>🔑 Seri Acuan ({lockerData?.Kode_Silinder})</span>
                </div>
              </Html>
            )}

            {/* 3D Floating HUD Tag hovering over active/hovered locker */}
            {(isSelected || (hovered && !isOpen)) && (
              <Html
                position={[facing * 0.2, height * 0.5, 0]}
                center
                distanceFactor={8}
                zIndexRange={[100, 0]}
              >
                <div className="glass-tag p-2 rounded-lg text-white pointer-events-none transition-all duration-200 border border-slate-700 min-w-[130px] shadow-2xl">
                  <div className="flex items-center justify-between gap-2 border-b border-slate-700/60 pb-1 mb-1">
                    <span className="font-extrabold text-sm text-sky-400 tracking-wide">
                      LOKER {lockerData?.No_Loker}
                    </span>
                    <span
                      className="w-2.5 h-2.5 rounded-full"
                      style={{ backgroundColor: pinColor }}
                    />
                  </div>
                  <div className="text-[11px] text-slate-300 flex justify-between">
                    <span className="text-slate-400">Kode:</span>
                    <span className="font-mono font-bold text-amber-300">
                      {lockerData?.Kode_Silinder || '-'}
                    </span>
                  </div>
                  <div className="text-[10px] text-slate-400 mt-0.5 flex justify-between">
                    <span>Kunci:</span>
                    <span className="text-slate-200 font-semibold">
                      {lockerData?.Status_Kunci || '-'}
                    </span>
                  </div>
                  {isMacet && (
                    <div className="mt-1 text-[10px] font-bold text-orange-400 bg-orange-950/60 px-1 py-0.5 rounded text-center border border-orange-700/50">
                      ⚠️ Silinder Macet Oksidasi
                    </div>
                  )}
                </div>
              </Html>
            )}
          </mesh>
        </group>
      </group>
    </group>
  );
}
