'use client';

import Image from "next/image";

type Slide = {
  title?: string;
  description: string;
  img?: string;
  dates?: string;
};

type Props = {
  title: string;
  slides: Slide[];
};

export default function CategoryCards({ title, slides }: Props) {
  const smallGridSections = ["langages", "projets"];
  const isSmallGrid = smallGridSections.includes(title);
  const coverLargeSections = ["accueil"];
  const containLargeSections = ["formation", "outils", "a-propos"];
  const useCoverOnLarge = coverLargeSections.includes(title);
  const useContainOnLarge = containLargeSections.includes(title);
  const showDates = title === "formation";
  return (
    <div className="w-full text-center">
      {isSmallGrid ? (
        <div className="grid gap-12 sm:grid-cols-2 lg:grid-cols-3 place-items-center">
          {slides.map((slide, i) => (
            <div key={i} className="bg-white/10 backdrop-blur-xl border border-white/30 shadow-2xl rounded-2xl p-6 w-[340px] min-h-[400px] flex flex-col items-center text-white transition-transform duration-300 hover:scale-[1.06] hover:bg-white/20">
              {slide.img && <Image src={slide.img} alt={slide.title || "Image"} width={300} height={200} unoptimized className="w-full h-48 object-contain rounded-xl mb-6" />}
              {slide.title && <h3 className="text-lg font-semibold mb-2">{slide.title}</h3>}
              {showDates && slide.dates && <p className="text-xs mb-2 opacity-70">{slide.dates}</p>}
              <p className="text-sm opacity-90">{slide.description}</p>
            </div>
          ))}
        </div>
      ) : (
        <div className="flex flex-col gap-10 items-center">
          {slides.map((slide, i) => (
            <div key={i} className="bg-white/10 backdrop-blur-xl border border-white/30 shadow-2xl rounded-2xl p-10 w-full max-w-5xl flex flex-col md:flex-row items-center gap-10 text-white transition-transform duration-300 hover:scale-[1.03] hover:bg-white/20">
              {slide.img && (
                <div className="w-full md:w-[45%] aspect-[16/9] rounded-2xl overflow-hidden bg-white/5 flex items-center justify-center">
                  <Image src={slide.img} alt={slide.title || "Image"} width={800} height={450} unoptimized className={useContainOnLarge ? "w-full h-full object-contain p-2" : useCoverOnLarge ? "w-full h-full object-cover" : "w-full h-full object-contain"} />
                </div>
              )}
              <div className="flex-1 flex flex-col text-left gap-4">
                {slide.title && <h3 className="text-3xl font-semibold">{slide.title}</h3>}
                {showDates && slide.dates && <p className="text-sm opacity-70">{slide.dates}</p>}
                <p className="opacity-90 leading-relaxed">{slide.description}</p>
              </div>
            </div>
          ))}
        </div>
      )}
    </div>
  );
}
