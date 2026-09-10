import React, { useMemo } from 'react';
import * as THREE from 'three';
import {
  createFloorTileTexture,
  createWallClockTexture,
  createNationalPortraitsTexture,
  createWhiteboardTexture,
  createSafetyPosterTexture,
  createNoticeSignTexture,
  createWindowExteriorTexture,
} from '../../utils/textureGenerator';

export function LabRoom({
  floorTexture,
}) {
  const roomLength = 14; // Z: -7 to +7
  const roomWidth = 8;   // X: -4 to +4
  const roomHeight = 3.5;// Y: 0 to 3.5

  // Generate textures
  const clockTexture = useMemo(() => createWallClockTexture(), []);
  const garudaTexture = useMemo(() => createNationalPortraitsTexture('garuda'), []);
  const presidentTexture = useMemo(() => createNationalPortraitsTexture('president'), []);
  const vpTexture = useMemo(() => createNationalPortraitsTexture('vp'), []);
  const whiteboardTexture = useMemo(() => createWhiteboardTexture(), []);
  const safetyPosterTexture = useMemo(() => createSafetyPosterTexture(), []);
  const noticeSignTexture = useMemo(() => createNoticeSignTexture(), []);
  const windowExteriorTexture = useMemo(() => createWindowExteriorTexture(), []);

  // Fluorescent lights suspended from ceiling
  const lightFixtures = useMemo(() => {
    const list = [];
    // 3 rows across X (-2.0, 0, +2.0) and 4 fixtures along Z (-4.5, -1.5, +1.5, +4.5)
    [-2.2, 0, 2.2].forEach((x) => {
      [-4.5, -1.5, 1.5, 4.5].forEach((z) => {
        list.push({ x, z });
      });
    });
    return list;
  }, []);

  return (
    <group>
      {/* 1. Glossy White Ceramic Floor (50x50 cm tiles with grey grout) */}
      <mesh
        rotation={[-Math.PI / 2, 0, 0]}
        position={[0, 0, 0]}
        receiveShadow
      >
        <planeGeometry args={[roomWidth, roomLength]} />
        <meshStandardMaterial
          map={floorTexture}
          roughness={0.15}
          metalness={0.05}
          envMapIntensity={0.8}
        />
      </mesh>

      {/* Floor Skirting / Baseboard */}
      {/* Left Baseboard */}
      <mesh position={[-roomWidth / 2 + 0.03, 0.05, 0]}>
        <boxGeometry args={[0.06, 0.1, roomLength]} />
        <meshStandardMaterial color="#cbd5e1" roughness={0.4} />
      </mesh>
      {/* Right Baseboard */}
      <mesh position={[roomWidth / 2 - 0.03, 0.05, 0]}>
        <boxGeometry args={[0.06, 0.1, roomLength]} />
        <meshStandardMaterial color="#cbd5e1" roughness={0.4} />
      </mesh>
      {/* Front Baseboard */}
      <mesh position={[0, 0.05, -roomLength / 2 + 0.03]}>
        <boxGeometry args={[roomWidth, 0.1, 0.06]} />
        <meshStandardMaterial color="#cbd5e1" roughness={0.4} />
      </mesh>
      {/* Rear Baseboard */}
      <mesh position={[0, 0.05, roomLength / 2 - 0.03]}>
        <boxGeometry args={[roomWidth, 0.1, 0.06]} />
        <meshStandardMaterial color="#cbd5e1" roughness={0.4} />
      </mesh>

      {/* 2. Flat White Ceiling */}
      <mesh
        rotation={[Math.PI / 2, 0, 0]}
        position={[0, roomHeight, 0]}
      >
        <planeGeometry args={[roomWidth, roomLength]} />
        <meshStandardMaterial
          color="#f8fafc"
          roughness={0.8}
          metalness={0.01}
        />
      </mesh>

      {/* 3. Smooth Off-White / Eggshell Walls */}
      {/* Front Wall (Z = -roomLength / 2) */}
      <mesh
        position={[0, roomHeight / 2, -roomLength / 2]}
        receiveShadow
      >
        <planeGeometry args={[roomWidth, roomHeight]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.6} />
      </mesh>

      {/* Rear Wall (Z = +roomLength / 2) */}
      <mesh
        rotation={[0, Math.PI, 0]}
        position={[0, roomHeight / 2, roomLength / 2]}
        receiveShadow
      >
        <planeGeometry args={[roomWidth, roomHeight]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.6} />
      </mesh>

      {/* Left Wall (X = -roomWidth / 2) */}
      <mesh
        rotation={[0, Math.PI / 2, 0]}
        position={[-roomWidth / 2, roomHeight / 2, 0]}
        receiveShadow
      >
        <planeGeometry args={[roomLength, roomHeight]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.6} />
      </mesh>

      {/* Right Wall (X = +roomWidth / 2) - Cutout with large continuous windows */}
      {/* Solid upper wall above windows */}
      <mesh
        rotation={[0, -Math.PI / 2, 0]}
        position={[roomWidth / 2, 2.9, 0]}
      >
        <planeGeometry args={[roomLength, 1.2]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.6} />
      </mesh>
      {/* Solid lower wall below windows */}
      <mesh
        rotation={[0, -Math.PI / 2, 0]}
        position={[roomWidth / 2, 0.45, 0]}
      >
        <planeGeometry args={[roomLength, 0.9]} />
        <meshStandardMaterial color="#f1f5f9" roughness={0.6} />
      </mesh>

      {/* 4. Central Square Concrete Pillar (Tiang Kolom Beton Persegi) */}
      <group position={[-0.1, roomHeight / 2, -1.8]}>
        <mesh castShadow receiveShadow>
          <boxGeometry args={[0.55, roomHeight, 0.55]} />
          <meshStandardMaterial color="#f8fafc" roughness={0.5} />
        </mesh>
        {/* Pillar base molding */}
        <mesh position={[0, -roomHeight / 2 + 0.06, 0]}>
          <boxGeometry args={[0.62, 0.12, 0.62]} />
          <meshStandardMaterial color="#e2e8f0" roughness={0.4} />
        </mesh>
        {/* Pillar top molding */}
        <mesh position={[0, roomHeight / 2 - 0.06, 0]}>
          <boxGeometry args={[0.62, 0.12, 0.62]} />
          <meshStandardMaterial color="#e2e8f0" roughness={0.4} />
        </mesh>

        {/* Signature Round Wall Clock mounted at eye level on front face */}
        <group position={[0, 0.25, -0.28]}>
          <mesh rotation={[0, Math.PI, 0]} castShadow>
            <cylinderGeometry args={[0.22, 0.22, 0.04, 32]} />
            <meshStandardMaterial
              map={clockTexture}
              roughness={0.2}
              metalness={0.1}
            />
          </mesh>
        </group>

        {/* Yellow Notice on side of pillar matching classroom photo */}
        <mesh position={[-0.28, -0.2, 0]} rotation={[0, -Math.PI / 2, 0]}>
          <planeGeometry args={[0.32, 0.24]} />
          <meshBasicMaterial map={noticeSignTexture} />
        </mesh>
      </group>

      {/* 5. Front Wall Setup (Whiteboard & 3 National Portraits) */}
      <group position={[0, 0, -roomLength / 2 + 0.04]}>
        {/* Large Magnetic Whiteboard */}
        <mesh position={[-0.4, 1.8, 0]} receiveShadow castShadow>
          <planeGeometry args={[4.2, 1.45]} />
          <meshStandardMaterial map={whiteboardTexture} roughness={0.15} metalness={0.1} />
        </mesh>

        {/* Whiteboard aluminum bottom marker tray */}
        <mesh position={[-0.4, 1.05, 0.04]} castShadow>
          <boxGeometry args={[4.2, 0.02, 0.08]} />
          <meshStandardMaterial color="#94a3b8" metalness={0.8} roughness={0.3} />
        </mesh>
        {/* Whiteboard markers & eraser on tray */}
        <mesh position={[-1.2, 1.07, 0.04]}>
          <boxGeometry args={[0.14, 0.03, 0.05]} />
          <meshStandardMaterial color="#1e293b" roughness={0.8} />
        </mesh>
        <mesh position={[-0.8, 1.07, 0.04]} rotation={[0, 0.3, 0]}>
          <cylinderGeometry args={[0.008, 0.008, 0.12, 8]} />
          <meshStandardMaterial color="#2563eb" />
        </mesh>
        <mesh position={[-0.6, 1.07, 0.04]} rotation={[0, -0.2, 0]}>
          <cylinderGeometry args={[0.008, 0.008, 0.12, 8]} />
          <meshStandardMaterial color="#dc2626" />
        </mesh>

        {/* 3 Formal Framed Portraits hung horizontally above the whiteboard */}
        {/* President Portrait (Left) */}
        <mesh position={[-1.3, 2.85, 0]} castShadow>
          <planeGeometry args={[0.65, 0.8]} />
          <meshStandardMaterial map={presidentTexture} roughness={0.3} />
        </mesh>
        {/* Golden Garuda Pancasila (Center) */}
        <mesh position={[-0.4, 2.9, 0]} castShadow>
          <planeGeometry args={[0.7, 0.85]} />
          <meshStandardMaterial map={garudaTexture} roughness={0.25} />
        </mesh>
        {/* Vice President Portrait (Right) */}
        <mesh position={[0.5, 2.85, 0]} castShadow>
          <planeGeometry args={[0.65, 0.8]} />
          <meshStandardMaterial map={vpTexture} roughness={0.3} />
        </mesh>

        {/* Teacher's Wooden Desk Station near front corner */}
        <group position={[-2.8, 0, 1.5]}>
          {/* Wooden desk top */}
          <mesh position={[0, 0.74, 0]} castShadow receiveShadow>
            <boxGeometry args={[1.3, 0.04, 0.75]} />
            <meshStandardMaterial color="#78350f" roughness={0.5} />
          </mesh>
          {/* Desk drawer pedestal (right) */}
          <mesh position={[0.42, 0.36, 0]} castShadow>
            <boxGeometry args={[0.38, 0.7, 0.68]} />
            <meshStandardMaterial color="#5e2908" roughness={0.6} />
          </mesh>
          {/* Desk drawer handles */}
          {[0.55, 0.35, 0.15].map((y, idx) => (
            <mesh key={idx} position={[0.42, y, -0.35]}>
              <boxGeometry args={[0.1, 0.015, 0.02]} />
              <meshStandardMaterial color="#e2e8f0" metalness={0.9} roughness={0.2} />
            </mesh>
          ))}
          {/* Desk left panel leg */}
          <mesh position={[-0.6, 0.36, 0]} castShadow>
            <boxGeometry args={[0.04, 0.7, 0.68]} />
            <meshStandardMaterial color="#5e2908" roughness={0.6} />
          </mesh>
          {/* Desk modesty back panel */}
          <mesh position={[0, 0.42, 0.3]}>
            <boxGeometry args={[1.2, 0.48, 0.02]} />
            <meshStandardMaterial color="#5e2908" roughness={0.6} />
          </mesh>
          {/* Teacher's office chair */}
          <group position={[0, 0, -0.45]}>
            <mesh position={[0, 0.45, 0]} castShadow>
              <boxGeometry args={[0.44, 0.06, 0.42]} />
              <meshStandardMaterial color="#1e293b" roughness={0.7} />
            </mesh>
            <mesh position={[0, 0.75, 0.18]} castShadow>
              <boxGeometry args={[0.42, 0.5, 0.05]} />
              <meshStandardMaterial color="#1e293b" roughness={0.7} />
            </mesh>
            <mesh position={[0, 0.22, 0]}>
              <cylinderGeometry args={[0.025, 0.025, 0.44, 12]} />
              <meshStandardMaterial color="#0f172a" metalness={0.8} />
            </mesh>
          </group>
          {/* Black Electric Standing Floor Fan */}
          <group position={[1.1, 0, -0.2]}>
            <mesh position={[0, 0.02, 0]}>
              <cylinderGeometry args={[0.22, 0.22, 0.03, 24]} />
              <meshStandardMaterial color="#18181b" roughness={0.4} />
            </mesh>
            <mesh position={[0, 0.6, 0]}>
              <cylinderGeometry args={[0.016, 0.016, 1.2, 12]} />
              <meshStandardMaterial color="#27272a" metalness={0.8} />
            </mesh>
            {/* Fan motor & cage */}
            <mesh position={[0, 1.25, 0]} rotation={[0.2, 0, 0]}>
              <cylinderGeometry args={[0.24, 0.24, 0.08, 24]} />
              <meshStandardMaterial color="#18181b" wireframe={true} />
            </mesh>
          </group>
        </group>
      </group>

      {/* 6. Right Wall Windows with Continuous Louver Slats (Jalusi) & Outside Tropical View */}
      <group position={[roomWidth / 2 - 0.02, 0, 0]}>
        {/* Exterior backdrop with bright sky and lush tropical green trees */}
        <mesh position={[0.8, 1.8, 0]} rotation={[0, -Math.PI / 2, 0]}>
          <planeGeometry args={[roomLength * 1.1, 3.2]} />
          <meshBasicMaterial map={windowExteriorTexture} side={THREE.DoubleSide} />
        </mesh>

        {/* 6 Multi-pane Window Bays */}
        {[-4.8, -2.9, -1.0, 0.9, 2.8, 4.7].map((zPos, bayIdx) => (
          <group key={bayIdx} position={[0, 1.8, zPos]}>
            {/* Window Frame (White aluminum) */}
            <mesh castShadow>
              <boxGeometry args={[0.08, 1.7, 1.6]} />
              <meshStandardMaterial color="#ffffff" roughness={0.2} metalness={0.1} />
            </mesh>
            {/* Inner Window Glass Pane */}
            <mesh>
              <boxGeometry args={[0.02, 1.62, 1.52]} />
              <meshPhysicalMaterial
                color="#e0f2fe"
                transmission={0.85}
                opacity={1}
                transparent
                roughness={0.05}
                ior={1.5}
              />
            </mesh>

            {/* Horizontal Louver Slats (Jalusi horizontal) */}
            {Array.from({ length: 14 }).map((_, sIdx) => (
              <mesh
                key={sIdx}
                position={[-0.02, -0.7 + sIdx * 0.11, 0]}
                rotation={[0.35, 0, 0]}
              >
                <boxGeometry args={[0.01, 0.04, 1.48]} />
                <meshStandardMaterial color="#f8fafc" roughness={0.4} />
              </mesh>
            ))}
          </group>
        ))}

        {/* White Split Wall-Mounted AC Unit (High up near ceiling) */}
        <group position={[-0.2, 3.0, -3.2]}>
          <mesh castShadow>
            <boxGeometry args={[0.26, 0.32, 0.95]} />
            <meshStandardMaterial color="#ffffff" roughness={0.25} metalness={0.05} />
          </mesh>
          {/* Air louver flap */}
          <mesh position={[-0.12, -0.11, 0]} rotation={[0.4, 0, 0]}>
            <boxGeometry args={[0.02, 0.05, 0.9]} />
            <meshStandardMaterial color="#e2e8f0" roughness={0.3} />
          </mesh>
          {/* Green power LED */}
          <mesh position={[-0.13, 0.05, 0.38]}>
            <cylinderGeometry args={[0.005, 0.005, 0.005, 8]} />
            <meshBasicMaterial color="#22c55e" />
          </mesh>
        </group>
      </group>

      {/* 7. Left Wall Safety & Notice Boards (K3 Regulations) */}
      <group position={[-roomWidth / 2 + 0.04, 0, 0]}>
        {/* Yellow K3 Lab Safety Regulations Board */}
        <mesh position={[0, 1.9, -1.8]} rotation={[0, Math.PI / 2, 0]} castShadow>
          <planeGeometry args={[1.1, 1.5]} />
          <meshStandardMaterial map={safetyPosterTexture} roughness={0.3} />
        </mesh>

        {/* White Announcement Bulletin Board */}
        <group position={[0, 1.9, 1.5]} rotation={[0, Math.PI / 2, 0]}>
          <mesh castShadow>
            <boxGeometry args={[1.8, 1.2, 0.03]} />
            <meshStandardMaterial color="#cbd5e1" metalness={0.7} roughness={0.3} />
          </mesh>
          <mesh position={[0, 0, 0.02]}>
            <planeGeometry args={[1.72, 1.12]} />
            <meshStandardMaterial color="#d4b996" roughness={0.8} /> {/* Cork board */}
          </mesh>
          {/* Notice papers pinned on bulletin board */}
          <mesh position={[-0.45, 0.15, 0.03]} rotation={[0, 0, 0.04]}>
            <planeGeometry args={[0.3, 0.4]} />
            <meshStandardMaterial color="#ffffff" roughness={0.7} />
          </mesh>
          <mesh position={[0.3, 0.1, 0.03]} rotation={[0, 0, -0.05]}>
            <planeGeometry args={[0.35, 0.45]} />
            <meshStandardMaterial color="#fef08a" roughness={0.7} />
          </mesh>
        </group>
      </group>

      {/* 8. Rear Glass Enclosure (Ruang Partisi Kaca) */}
      <group position={[1.5, 0, roomLength / 2 - 1.6]}>
        {/* Black-anodized aluminum frame booth walls */}
        {/* Front partition wall with glass */}
        <mesh position={[0, 1.6, 0]}>
          <boxGeometry args={[4.8, 3.2, 0.06]} />
          <meshPhysicalMaterial
            color="#94a3b8"
            transmission={0.85}
            opacity={0.9}
            transparent
            roughness={0.1}
            ior={1.52}
          />
        </mesh>
        {/* Black framing structure */}
        <mesh position={[0, 3.18, 0]}>
          <boxGeometry args={[4.84, 0.08, 0.08]} />
          <meshStandardMaterial color="#18181b" metalness={0.9} roughness={0.2} />
        </mesh>
        <mesh position={[0, 0.04, 0]}>
          <boxGeometry args={[4.84, 0.08, 0.08]} />
          <meshStandardMaterial color="#18181b" metalness={0.9} roughness={0.2} />
        </mesh>
        {[-2.4, -1.2, 0, 1.2, 2.4].map((x, idx) => (
          <mesh key={idx} position={[x, 1.6, 0]}>
            <boxGeometry args={[0.07, 3.2, 0.08]} />
            <meshStandardMaterial color="#18181b" metalness={0.9} roughness={0.2} />
          </mesh>
        ))}
        {/* Glass booth door */}
        <group position={[-0.6, 1.0, 0.02]}>
          {/* Door silver handle */}
          <mesh position={[0.45, 0, 0.04]}>
            <cylinderGeometry args={[0.015, 0.015, 0.35, 12]} />
            <meshStandardMaterial color="#e2e8f0" metalness={0.9} roughness={0.15} />
          </mesh>
        </group>
      </group>

      {/* 9. Exposed Suspended Dual-Tube Fluorescent Fixtures & Dangling Sockets */}
      {lightFixtures.map((pos, idx) => (
        <group key={idx} position={[pos.x, roomHeight - 0.35, pos.y || pos.z]}>
          {/* Suspension wires from ceiling */}
          <mesh position={[-0.5, 0.18, 0]}>
            <cylinderGeometry args={[0.003, 0.003, 0.36, 8]} />
            <meshBasicMaterial color="#64748b" />
          </mesh>
          <mesh position={[0.5, 0.18, 0]}>
            <cylinderGeometry args={[0.003, 0.003, 0.36, 8]} />
            <meshBasicMaterial color="#64748b" />
          </mesh>

          {/* White metal reflector fixture housing */}
          <mesh position={[0, 0, 0]} castShadow>
            <boxGeometry args={[1.3, 0.05, 0.22]} />
            <meshStandardMaterial color="#ffffff" roughness={0.3} />
          </mesh>

          {/* Dual fluorescent tubes (Lampu Neon TL) emitting diffused cool daylight (6000K) */}
          <mesh position={[0, -0.03, -0.05]}>
            <cylinderGeometry args={[0.015, 0.015, 1.2, 12]} rotation={[0, 0, Math.PI / 2]} />
            <meshBasicMaterial color="#e0f2fe" />
          </mesh>
          <mesh position={[0, -0.03, 0.05]}>
            <cylinderGeometry args={[0.015, 0.015, 1.2, 12]} rotation={[0, 0, Math.PI / 2]} />
            <meshBasicMaterial color="#e0f2fe" />
          </mesh>

          {/* Diffused light source */}
          <pointLight
            color="#f0f9ff"
            intensity={0.4}
            distance={5.5}
            decay={2}
          />

          {/* Dangling electric socket box hanging below ceiling (colokan gantung) */}
          {idx % 2 === 0 && (
            <group position={[0, -0.9, 0]}>
              {/* Dangling black wire */}
              <mesh position={[0, 0.45, 0]}>
                <cylinderGeometry args={[0.004, 0.004, 0.9, 8]} />
                <meshBasicMaterial color="#1e293b" />
              </mesh>
              {/* Hanging socket cube */}
              <mesh castShadow>
                <boxGeometry args={[0.09, 0.09, 0.09]} />
                <meshStandardMaterial color="#f8fafc" roughness={0.4} />
              </mesh>
              {/* Plug sockets on sides */}
              <mesh position={[0, 0, 0.046]}>
                <cylinderGeometry args={[0.012, 0.012, 0.005, 12]} rotation={[Math.PI / 2, 0, 0]} />
                <meshBasicMaterial color="#0f172a" />
              </mesh>
            </group>
          )}
        </group>
      ))}
    </group>
  );
}
