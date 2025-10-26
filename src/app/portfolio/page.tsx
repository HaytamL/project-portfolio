"use client";

import Image from "next/image";
import Link from "next/link";

export default function PortfolioProjectPage() {
  return (
    <div className="flex flex-col items-center w-full min-h-screen py-20 px-4 text-white">      
        <h1 className="text-3xl md:text-4xl font-bold mb-12 text-center">Projet Portfolio</h1>
        <div className="flex flex-col md:flex-row items-center gap-10 max-w-6xl mb-16 w-full">
            <Image src="/logo.png" width={600} height={600} alt="Logo du Portfolio" className="rounded-2xl shadow-2xl w-full max-w-xs md:max-w-sm object-contain" unoptimized />
            <div className="flex-1 text-base md:text-lg opacity-90 leading-relaxed">
            Ce site représente mon portfolio personnel : un espace où je mets en lumière mes projets,
            mes compétences et mon évolution dans le domaine du développement.
            <br /><br />
            Le design a été pensé pour être moderne et intuitif, avec un thème visuel qui reflète mes goûts.
            <br /><br />
            J&apos;ai réalisé ce portfolio pour présenter mon travail de manière professionnelle,
            tout en explorant de nouvelles méthodologies et concepts en développement web.
            </div>
        </div>
        <div className="flex gap-3 md:gap-4 mb-10 flex-wrap justify-center">
            <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium backdrop-blur-sm">
                <Image src="/html.png" width={26} height={26} alt="HTML" unoptimized />
                <span>HTML</span>
            </div>
            <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium backdrop-blur-sm">
                <Image src="/css.png" width={26} height={26} alt="CSS" unoptimized />
                <span>CSS</span>
            </div>
            <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium backdrop-blur-sm">
                <Image src="/js.png" width={26} height={26} alt="JavaScript" unoptimized />
                <span>JavaScript</span>
            </div>
        </div>
        <Link href="https://github.com/HaytamL/project-portfolio" target="_blank" className="px-6 sm:px-8 py-3 border border-white/30 bg-white/10 backdrop-blur-xl text-white rounded-2xl font-medium transition-all duration-300 hover:bg-white/20 hover:scale-[1.04] hover:shadow-xl">
            Voir sur GitHub
        </Link>
        <Link href="/" className="self-start mt-10 px-4 py-2 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium hover:bg-white/20 transition-all">
            Retour à l&apos;accueil
        </Link>
    </div>
  );
}
