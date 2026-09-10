import React, { useRef, useEffect } from 'react';
import { useFrame, useThree } from '@react-three/fiber';
import { OrbitControls } from '@react-three/drei';
import * as THREE from 'three';

export const CAMERA_PRESETS = {
  overview: {
    label: 'Overview Room (Isometrik)',
    position: [7.8, 6.8, 8.2],
    target: [0, 0.7, 0],
    description: 'Tampilan atas isometrik menyeluruh seluruh laboratorium dan 4 meja praktikum'
  },
  front: {
    label: 'Perspective Depan (Pintu Masuk)',
    position: [-3.4, 1.7, -6.3],
    target: [0.2, 1.1, -0.5],
    description: 'Sudut pandang dari depan membingkai papan tulis, pilar jam analog, dan jendela'
  },
  meja1: {
    label: 'Meja 1 (Row A & B)',
    position: [-3.8, 1.55, 0.2],
    target: [-2.7, 0.75, 0.2],
    description: 'Lorong Meja 1 (Paling kiri, dekat dinding K3)'
  },
  meja2: {
    label: 'Meja 2 (Row C & D)',
    position: [-1.9, 1.55, 0.2],
    target: [-0.9, 0.75, 0.2],
    description: 'Lorong Meja 2 (Sisi kiri pilar beton)'
  },
  meja3: {
    label: 'Meja 3 (Row E & F)',
    position: [-0.05, 1.55, 0.2],
    target: [0.9, 0.75, 0.2],
    description: 'Lorong Meja 3 (Tengah lab)'
  },
  meja4: {
    label: 'Meja 4 (Row G & H)',
    position: [1.75, 1.55, 0.2],
    target: [2.7, 0.75, 0.2],
    description: 'Lorong Meja 4 (Paling kanan, dekat jendela berjalusi)'
  }
};

/**
 * Calculates world coordinates for a given locker ID (e.g. "A1", "D12")
 */
export function getLockerWorldPosition(lockerId) {
  if (!lockerId) return null;
  const match = lockerId.match(/^([A-H])(\d+)$/i);
  if (!match) return null;

  const row = match[1].toUpperCase();
  const num = parseInt(match[2], 10);
  if (num < 1 || num > 12) return null;

  // Island X centers
  const islandX = {
    A: -2.7, B: -2.7,
    C: -0.9, D: -0.9,
    E: 0.9,  F: 0.9,
    G: 2.7,  H: 2.7
  }[row];

  const facing = ['A', 'C', 'E', 'G'].includes(row) ? -1 : 1;
  const doorX = islandX + facing * 0.25;

  // Z position
  const lockerWidth = 0.72;
  const zPos = -((12 - 1) / 2) * lockerWidth + (num - 1) * lockerWidth;

  return {
    doorPos: [doorX, 0.5, zPos],
    islandX,
    facing,
    zPos,
    row,
    num
  };
}

export function CameraController({
  activePreset = 'overview',
  focusedLockerId = null,
  onUserInteracted
}) {
  const controlsRef = useRef();
  const targetCamPos = useRef(new THREE.Vector3(...CAMERA_PRESETS.overview.position));
  const targetLookAt = useRef(new THREE.Vector3(...CAMERA_PRESETS.overview.target));
  const isTransitioning = useRef(true);
  const transitionProgress = useRef(0);

  // Update target coordinates when preset or focused locker changes
  useEffect(() => {
    if (focusedLockerId) {
      const coords = getLockerWorldPosition(focusedLockerId);
      if (coords) {
        // Position camera in aisle facing the locker
        const camX = coords.islandX + coords.facing * 1.15;
        const camY = 0.85;
        const camZ = coords.zPos + (coords.facing === -1 ? 0.3 : -0.3);

        targetCamPos.current.set(camX, camY, camZ);
        targetLookAt.current.set(coords.doorPos[0], 0.5, coords.zPos);
        isTransitioning.current = true;
        transitionProgress.current = 0;
        return;
      }
    }

    if (activePreset && CAMERA_PRESETS[activePreset]) {
      const preset = CAMERA_PRESETS[activePreset];
      targetCamPos.current.set(...preset.position);
      targetLookAt.current.set(...preset.target);
      isTransitioning.current = true;
      transitionProgress.current = 0;
    }
  }, [activePreset, focusedLockerId]);

  useFrame((state, delta) => {
    if (!isTransitioning.current || !controlsRef.current) return;

    // Smoothly lerp camera position and controls target
    state.camera.position.lerp(targetCamPos.current, 0.06);
    controlsRef.current.target.lerp(targetLookAt.current, 0.06);
    controlsRef.current.update();

    // Check if close enough to finish transition
    if (
      state.camera.position.distanceTo(targetCamPos.current) < 0.05 &&
      controlsRef.current.target.distanceTo(targetLookAt.current) < 0.03
    ) {
      isTransitioning.current = false;
    }
  });

  return (
    <OrbitControls
      ref={controlsRef}
      makeDefault
      enableDamping
      dampingFactor={0.07}
      maxPolarAngle={Math.PI / 2 - 0.05} // Prevent camera going below floor
      minDistance={0.5}
      maxDistance={22}
      onStart={() => {
        isTransitioning.current = false;
        if (onUserInteracted) onUserInteracted();
      }}
    />
  );
}
