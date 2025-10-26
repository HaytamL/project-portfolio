"use client";
import { useState } from "react";
import Image from "next/image";

export default function Footer() {
  const [isModalOpen, setIsModalOpen] = useState(false);

  return (
    <footer className="row-start-3 flex gap-[24px] flex-wrap items-center justify-center">
      <a className="flex items-center gap-1 hover:underline hover:underline-offset-4" href="https://github.com/HaytamL" target="_blank" rel="noopener noreferrer">
        <Image aria-hidden src="/github.png" alt="GitHub icon" width={16} height={16} />Github
      </a>
      <a className="flex items-center gap-1 hover:underline hover:underline-offset-4" href="https://www.linkedin.com/in/haytam-lazizi-vix-931882386/" target="_blank" rel="noopener noreferrer">
        <Image aria-hidden src="/linkedin-big-logo.svg" alt="LinkedIn icon" width={16} height={16} />Linkedin
      </a>
      <button onClick={() => setIsModalOpen(true)} className="flex items-center gap-1 hover:underline hover:underline-offset-4">
        <Image aria-hidden src="/contact.svg" alt="Contact icon" width={16} height={16} />
        Me contacter
      </button>
      {isModalOpen && (
        <div className="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm">
          <div className="rounded-3xl p-8 w-96 relative bg-white/10 backdrop-blur-xl shadow-xl border border-white/20">
            <h2 className="text-3xl font-bold mb-6 text-white text-center">Contact</h2>
            <div className="flex flex-col gap-6 text-lg">
              <div className="flex flex-col items-center gap-2">
                <p className="font-semibold text-white text-center break-all">haytam.lazizi-vix@epitech.eu</p>
                <a href="mailto:haytam.lazizi-vix@epitech.eu" className="px-4 py-2 border border-black rounded-xl font-medium text-white">Envoyer un email</a>
              </div>
              <div className="flex flex-col items-center gap-1">
                <span className="font-semibold text-white">Téléphone :</span>
                <span className="text-white">07 60 82 31 19</span>
              </div>
            </div>
            <button onClick={() => setIsModalOpen(false)} className="absolute top-4 right-5 text-white text-2xl hover:opacity-70 transition-opacity">
              x
            </button>
          </div>
        </div>
      )}
    </footer>
  );
}
