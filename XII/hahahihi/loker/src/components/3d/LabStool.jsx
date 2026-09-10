import React from 'react';
import * as THREE from 'three';

/**
 * Photorealistic Laboratory Stool matching classroom photos
 * - Round wooden-topped lab stool with black tubular steel legs & circular footrest ring
 * - Rectangular wooden bench (dingklik)
 */
export function LabStool({ position = [0, 0, 0], rotation = [0, 0, 0], type = 'round' }) {
  if (type === 'bench') {
    // Rectangular wooden bench (dingklik)
    return (
      <group position={position} rotation={rotation}>
        {/* Top wooden seat plank */}
        <mesh position={[0, 0.38, 0]} castShadow receiveShadow>
          <boxGeometry args={[0.3, 0.04, 0.45]} />
          <meshStandardMaterial color="#854d0e" roughness={0.65} metalness={0.05} />
        </mesh>
        {/* 4 Wooden Legs */}
        {[-0.11, 0.11].map((x, i) =>
          [-0.18, 0.18].map((z, j) => (
            <mesh key={`${i}-${j}`} position={[x, 0.18, z]} castShadow>
              <boxGeometry args={[0.04, 0.36, 0.04]} />
              <meshStandardMaterial color="#713f12" roughness={0.7} />
            </mesh>
          ))
        )}
        {/* Cross brace */}
        <mesh position={[0, 0.12, 0]}>
          <boxGeometry args={[0.22, 0.03, 0.36]} />
          <meshStandardMaterial color="#59300b" roughness={0.7} />
        </mesh>
      </group>
    );
  }

  // Standard Round Lab Stool with black tubular metal legs and circular foot ring
  return (
    <group position={position} rotation={rotation}>
      {/* Round Wooden Seat */}
      <mesh position={[0, 0.44, 0]} castShadow receiveShadow>
        <cylinderGeometry args={[0.16, 0.16, 0.035, 24]} />
        <meshStandardMaterial
          color="#9a5b28"
          roughness={0.5}
          metalness={0.05}
        />
      </mesh>

      {/* Seat Bottom Plate */}
      <mesh position={[0, 0.415, 0]}>
        <cylinderGeometry args={[0.11, 0.11, 0.015, 16]} />
        <meshStandardMaterial color="#18181b" roughness={0.4} metalness={0.8} />
      </mesh>

      {/* 4 Black Tubular Steel Legs (Angled outwards) */}
      {[0, Math.PI / 2, Math.PI, (3 * Math.PI) / 2].map((angle, idx) => {
        const radius = 0.09;
        const x = Math.sin(angle) * radius;
        const z = Math.cos(angle) * radius;
        return (
          <group key={idx} position={[x, 0.21, z]} rotation={[Math.cos(angle) * 0.08, 0, -Math.sin(angle) * 0.08]}>
            <mesh castShadow>
              <cylinderGeometry args={[0.01, 0.01, 0.42, 12]} />
              <meshStandardMaterial color="#18181b" roughness={0.3} metalness={0.85} />
            </mesh>
            {/* Rubber leg foot cap */}
            <mesh position={[0, -0.21, 0]}>
              <cylinderGeometry args={[0.014, 0.014, 0.02, 12]} />
              <meshStandardMaterial color="#09090b" roughness={0.9} />
            </mesh>
          </group>
        );
      })}

      {/* Circular Tubular Steel Footrest Ring */}
      <mesh position={[0, 0.16, 0]} rotation={[Math.PI / 2, 0, 0]} castShadow>
        <torusGeometry args={[0.13, 0.009, 12, 24]} />
        <meshStandardMaterial color="#27272a" roughness={0.35} metalness={0.85} />
      </mesh>
    </group>
  );
}
