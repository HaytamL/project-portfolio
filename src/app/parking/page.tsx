"use client";

import Image from "next/image";
import Link from "next/link";

export default function ParkingProjectPage() {
    return (
        <div className="flex flex-col items-center w-full min-h-screen py-20 px-6 text-white">
            <h1 className="text-4xl font-bold mb-12 text-center">Projet Parking Automatisé</h1>
            <div className="flex flex-col md:flex-row items-center gap-10 max-w-6xl mb-16">
                <div className="flex-1 text-lg opacity-90 leading-relaxed">
                    Dans le cadre de mon BTS CIEL, j&apos;ai dû réaliser en fin d&apos;année un projet permettant de valider mon diplôme.
                    Les projets n&apos;étaient pas choisis mais attribués. Celui que nous avons obtenu avec mon camarade consistait à automatiser le fonctionnement d&apos;un parking.
                    <br /><br />
                    Nous avions à disposition une caméra, 2 capteurs permettant de mesurer la taille des véhicules,
                    une barrière automatisée et un Raspberry Pi. 
                </div>
                <Image src="/images/parking.png" width={650} height={400} alt="Projet parking" className="rounded-2xl shadow-2xl object-cover" unoptimized/>
            </div>
            <div className="flex flex-col md:flex-row-reverse items-center gap-10 max-w-6xl mb-16">
                <div className="flex-1 text-lg opacity-90 leading-relaxed">
                    Le Raspberry se chargeait de la capture de la photo du véhicule
                    ainsi que la récupération des mesures puis envoyait ces données vers ma base de données MySQL.
                    <br/><br/>
                    J&apos;ai dû concevoir toute la structure de la base et surtout 
                    interpréter l’image reçue pour extraire la plaque via une API. Une fois décodée et traduite,
                    les informations telles que la plaque, la taille du véhicule, l&apos;heure d’entrée ou encore le statut d’abonné
                    étaient automatiquement affichées dans l&apos;application que j&apos;ai développée en C#.
                    <br/><br/>
                    L’objectif : un affichage clair, automatisé et à jour en temps réel.
                </div>
                <Image src="/images/bdd.png" width={650} height={400} alt="Base de données" className="rounded-2xl shadow-2xl object-contain" unoptimized />
            </div>
            <div className="flex gap-4 mb-10">
                <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium">
                    <Image src="/csharp.png" width={22} height={22} alt="C#" unoptimized />
                    C#
                </div>
                <div className="flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg text-sm font-medium">
                    <Image src="/sql.png" width={22} height={22} alt="MySQL" unoptimized />
                    MySQL
                </div>
            </div>
            <Link href="https://github.com/HaytamL/Parking-Project" target="_blank" className="px-8 py-3 border border-white/30 bg-white/10 backdrop-blur-xl text-white rounded-2xl font-medium transition-all duration-300 hover:bg-white/20 hover:scale-[1.04] hover:shadow-xl">
                Voir sur GitHub
            </Link>
            <Link href="/" className="self-start mb-6 px-4 py-2 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium hover:bg-white/20 transition-all">
                Retour à l&apos;accueil
            </Link>

        </div>
    );
}
