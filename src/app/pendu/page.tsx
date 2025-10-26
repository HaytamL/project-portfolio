"use client";

import Image from "next/image";
import Link from "next/link";

export default function HangmanProjectPage() {
  return (
    <div className="flex flex-col items-center w-full min-h-screen py-20 px-4 text-white">
        <h1 className="text-3xl md:text-4xl font-bold mb-12 text-center">Projet Pendu (Hangman)</h1>

        <div className="flex flex-col md:flex-row items-center gap-10 max-w-6xl mb-16 w-full">
        <Image src="/images/hangman.png" width={650} height={400} alt="Jeu du pendu en Python" className="rounded-2xl shadow-2xl w-full max-w-lg object-cover" unoptimized />
        <div className="flex-1 text-base md:text-lg opacity-90 leading-relaxed">
            Ce mini-projet a pour but de créer un jeu du Pendu en Python en utilisant la librairie Pygame.
            <br /><br />
            Le joueur doit deviner un mot caché en choisissant des lettres. À chaque erreur, une nouvelle partie
            du pendu apparaît jusqu&apos;à la défaite… ou la victoire !
            <br /><br />
            Ce projet m&apos;a permis de renforcer mes compétences en Python,
            en logique de jeu ainsi qu&apos;en traitement d&apos;événements utilisateurs.
        </div>
        </div>

        <div className="flex gap-3 md:gap-4 mb-10 flex-wrap justify-center">
        <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium backdrop-blur-sm">
            <Image src="/python.svg" width={42} height={42} alt="Python" unoptimized /> Python / Pygame
        </div>
        </div>

        <Link href="https://github.com/HaytamL/hangman" target="_blank" className="px-6 sm:px-8 py-3 border border-white/30 bg-white/10 backdrop-blur-xl text-white rounded-2xl font-medium transition-all duration-300 hover:bg-white/20 hover:scale-[1.04] hover:shadow-xl">
        Voir sur GitHub
        </Link>

        <Link href="/" className="self-start mt-10 px-4 py-2 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium hover:bg-white/20 transition-all">
        Retour à l&apos;accueil
        </Link>
    </div>
  );
}
