import React, { useRef } from 'react';
import * as THREE from 'three';

export function Lighting() {
  const sunLightRef = useRef();

  return (
    <>
      {/* Soft Ambient Bounce Light (0xe8eff5, intensity 0.65) */}
      <ambientLight color="#e8eff5" intensity={0.65} />

      {/* Primary Directional Sun Lighting penetrating from the right-side windows (intensity 2.2, warm-white 0xfff8ed) */}
      <directionalLight
        ref={sunLightRef}
        position={[6.5, 4.5, 0.5]}
        target-position={[0, 0.5, 0]}
        intensity={2.2}
        color="#fff8ed"
        castShadow
        shadow-mapSize-width={2048}
        shadow-mapSize-height={2048}
        shadow-camera-near={0.5}
        shadow-camera-far={18}
        shadow-camera-left={-7}
        shadow-camera-right={7}
        shadow-camera-top={6}
        shadow-camera-bottom={-6}
        shadow-bias={-0.0003}
        shadow-radius={2}
      />

      {/* Secondary Soft Sun Fill from right front */}
      <directionalLight
        position={[5.0, 3.2, -4.5]}
        intensity={0.8}
        color="#fef3c7"
      />

      {/* Overhead Fluorescent Diffused Daylight Array (6000K cool light, intensity 1.1) */}
      <directionalLight
        position={[0, 5, 0]}
        intensity={0.7}
        color="#f0f9ff"
      />

      {/* Soft floor bounce fill light */}
      <hemisphereLight
        args={['#f8fafc', '#94a3b8', 0.4]}
        position={[0, 3.5, 0]}
      />
    </>
  );
}
