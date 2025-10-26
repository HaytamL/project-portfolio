"use client";

import Image from "next/image";
import Link from "next/link";

export default function JobBoardProjectPage() {
  return (
    <div className="flex flex-col items-center w-full min-h-screen py-20 px-4 text-white">
        <h1 className="text-3xl md:text-4xl font-bold mb-12 text-center">Projet Job Board</h1>
        <div className="flex flex-col md:flex-row items-center gap-10 max-w-6xl mb-16 w-full">
            <Image src="/images/jobboard.png" width={650} height={400} alt="Interface du Job Board" className="rounded-2xl shadow-2xl w-full max-w-lg object-cover" unoptimized />
            <div className="flex-1 text-base md:text-lg opacity-90 leading-relaxed">
                Ce projet a été réalisé dans le cadre de ma formation en Pré-MSC chez epitech : une plateforme permettant
                aux utilisateurs de consulter des offres d&apos;emploi et de postuler facilement.
                <br /><br />
                Développé avec Symfony (PHP), le site intègre un système d’authentification,
                une gestion des utilisateurs et la possibilité de suivre ses candidatures.
                <br /><br />
                Une API REST permet la communication avec une base de données MySQL pour
                gérer toutes les informations liées au recrutement via un dashboard accessible uniquement à un administrateur.
            </div>
        </div>
        <div className="flex gap-3 md:gap-4 mb-10 flex-wrap justify-center">
            <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium backdrop-blur-sm">
            <Image src="/php.png" width={22} height={22} alt="PHP" unoptimized /> PHP / Symfony
            </div>
            <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium backdrop-blur-sm">
            <Image src="/sql.png" width={22} height={22} alt="MySQL" unoptimized /> MySQL + API REST
            </div>
        </div>
        <Link href="https://github.com/HaytamL/JobBoardProject" target="_blank" className="px-6 sm:px-8 py-3 border border-white/30 bg-white/10 backdrop-blur-xl text-white rounded-2xl font-medium transition-all duration-300 hover:bg-white/20 hover:scale-[1.04] hover:shadow-xl">
            Voir sur GitHub
        </Link>
        <Link href="/" className="self-start mt-10 px-4 py-2 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium hover:bg-white/20 transition-all">
            Retour à l&apos;accueil
        </Link>
    </div>
  );
}
