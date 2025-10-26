"use client";
import { useState } from "react";
import Image from "next/image";

export default function Footer() {
  const [isModalOpen, setIsModalOpen] = useState(false);

  return (
    <footer className="row-start-3 flex gap-[24px] flex-wrap items-center justify-center">
        <a className="flex items-center gap-1 hover:underline hover:underline-offset-4" href="https://github.com/HaytamL" target="_blank" rel="noopener noreferrer"><Image aria-hidden src="/github.png" alt="File icon" width={16} height={16} />Github</a>
        <a className="flex items-center gap-1 hover:underline hover:underline-offset-4" href="https://www.linkedin.com/in/haytam-lazizi-vix-931882386/"target="_blank"rel="noopener noreferrer"><Image aria-hidden src="/linkedin-big-logo.svg" alt="Window icon" width={16} height={16} />Linkedin</a>
        <button onClick={() => setIsModalOpen(true)}className="flex items-center gap-1 hover:underline hover:underline-offset-4">
          <Image aria-hidden src="/contact.svg" alt="Contact icon" width={16} height={16} />
          Me contacter
        </button>
      {isModalOpen && (
        <div className="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
          <div className="rounded-3xl shadow-2xl p-8 w-96 relative animate-zoomModal" style={{backgroundImage: 'url("/background.svg")', backgroundSize: "cover",backgroundPosition: "center"}}>
            <h2 className="text-3xl font-bold mb-6 text-center text-gray-800">Contactez-moi</h2>
            <form className="flex flex-col gap-4">
              <input type="text" placeholder="Votre nom" className="border border-white p-3 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-white transition duration-200 transform hover:scale-105"/>
              <input type="email"placeholder="Votre email" className="border border-white p-3 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-white transition duration-200 transform hover:scale-105"/>
              <textarea placeholder="Votre message" className="border border-white p-3 rounded-xl shadow-sm h-32 resize-none focus:outline-none focus:ring-2 focus:ring-white transition duration-200 transform hover:scale-105"/>
              <button type="submit"className="border-2 border-white text-white bg-transparent py-3 rounded-xl font-semibold hover:bg-white hover:text-black transition duration-200 transform hover:scale-105">
                Envoyer
              </button>
            </form>
            <button onClick={() => setIsModalOpen(false)} className="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl">x</button>
          </div>
        </div>
      )}
    </footer>
  );
}
