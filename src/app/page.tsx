'use client';

import { useState } from 'react';
import Navbar from './components/Navbar';
import CategoryCards from './components/CategoryCards';
import slidesData from '../data/slides.json';

export default function Home() {
  const [selectedSection, setSelectedSection] = useState<keyof typeof slidesData>('accueil');

  return (
    <div className="w-full flex flex-col items-center justify-center">
      <Navbar onSectionSelect={(s: string) => setSelectedSection(s as keyof typeof slidesData)} />

      <div className="w-full max-w-6xl px-6 pb-20 pt-10">
        <CategoryCards
          title={selectedSection}
          slides={slidesData[selectedSection] ?? []}
        />
      </div>
    </div>
  );
}
