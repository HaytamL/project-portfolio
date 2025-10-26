'use client';

import * as React from 'react';
import Image from "next/image";
import Link from "next/link";
import {
  NavigationMenu,
  NavigationMenuContent,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
} from '@/components/ui/navigation-menu';

interface NavbarProps {
  onSectionSelect?: (section: string) => void;
}

const projets: { title: string; href: string; description: string }[] = [
  {
    title: 'Job Board',
    href: '/jobboard',
    description: "Un site permettant à des utilisateurs de postuler à des offres d'emploi.",
  },
  {
    title: 'Parking',
    href: '/parking',
    description: "Une application permettant la gestion d'un parking automatisé.",
  },
  {
    title: 'Pendu',
    href: '/pendu',
    description: "Un jeu du pendu réalisé avec Python.",
  },
  {
    title: 'Portfolio',
    href: '/portfolio',
    description: "Mon portfolio.",
  },
];

type ListItemProps = {
  title: string;
  href: string;
  children: React.ReactNode;
  onClick?: (title: string) => void;
};

function ListItem({ title, children, href, onClick }: ListItemProps) {
  const handleClick = (e: React.MouseEvent<HTMLAnchorElement>) => {
  if (onClick && href.startsWith("#")) {
      e.preventDefault();
      onClick(title);
    }
  };

  return (
    <li>
      <NavigationMenuLink asChild>
        <Link href={href} onClick={handleClick} className="no-underline text-black hover:opacity-80 transition-opacity">
          <div className="text-sm leading-none font-medium text-black">{title}</div>
          <p className="text-black/70 line-clamp-2 text-sm leading-snug">{children}</p>
        </Link>
      </NavigationMenuLink>
    </li>
  );
}

export default function Navbar({ onSectionSelect }: NavbarProps) {
  const handleSelect = (section: string) => {
    const keyMap: Record<string, string> = {
      "Accueil": "accueil",
      "Ma formation": "formation",
      "À propos de moi": "a-propos",
      "Langages": "langages",
      "Projets": "projets",
      "Outils": "outils",
    };

    const mappedKey = keyMap[section] ?? section;
    onSectionSelect?.(mappedKey);
  };

  return (
    <div className="relative w-full flex justify-center px-4 z-10">
      <NavigationMenu viewport={false}>
        <NavigationMenuList className="text-black">
          
          <li className="flex items-center mr-4">
            <Image src="/logo.png" alt="Logo" width={38} height={38} className="rounded-full shadow-md hover:scale-105 transition-transform" unoptimized/>
          </li>

          <NavigationMenuItem>
            <NavigationMenuTrigger className="text-black hover:text-white data-[state=open]:text-white">Accueil</NavigationMenuTrigger>
            <NavigationMenuContent>
              <ul className="grid gap-2 md:w-[400px] lg:w-[500px] lg:grid-cols-[.75fr_1fr] bg-white p-4 rounded-xl shadow-md">
                <li className="row-span-3">
                  <NavigationMenuLink asChild>
                    <Link href="/" onClick={(e) => { e.preventDefault(); handleSelect('Accueil'); }} className="flex h-full w-full flex-col justify-end rounded-md p-6 no-underline select-none hover:opacity-80">
                      <div className="mt-4 mb-2 text-lg font-medium text-black">De l&apos;idée au code... Mon portfolio</div>
                      <p className="text-black/70 text-sm leading-tight">Bienvenue !</p>
                    </Link>
                  </NavigationMenuLink>
                </li>

                <ListItem href="#formation" title="Ma formation" onClick={handleSelect}>
                  Mes diplômes, expériences pro...
                </ListItem>
                <ListItem href="#a-propos" title="À propos de moi" onClick={handleSelect}>
                  Mon histoire
                </ListItem>
                
                <li>
                  <NavigationMenuLink asChild>
                    <a href="/cvhaytam.pdf" download className="no-underline text-black hover:opacity-80 transition-opacity">
                      <div className="text-sm leading-none font-medium text-black">Mon CV</div>
                      <p className="text-black/70 line-clamp-2 text-sm leading-snug">Cliquer pour télécharger mon CV.</p>
                    </a>
                  </NavigationMenuLink>
                </li>

              </ul>
            </NavigationMenuContent>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <NavigationMenuTrigger className="text-black hover:text-white data-[state=open]:text-white">Skills</NavigationMenuTrigger>
            <NavigationMenuContent>
              <ul className="grid w-[300px] gap-4 bg-white p-4 rounded-xl shadow-md">
                <li>
                  <NavigationMenuLink asChild>
                    <Link href="#langages" onClick={(e) => { e.preventDefault(); handleSelect('Langages'); }} className="text-black hover:text-black">
                      <div className="font-medium">Mes langages et frameworks</div>
                      <div className="text-black/70">Découvrez les langages que j&apos;ai appris et que j&apos;apprends actuellement.</div>
                    </Link>
                  </NavigationMenuLink>

                  <NavigationMenuLink asChild>
                    <Link href="#projets" onClick={(e) => { e.preventDefault(); handleSelect('Projets'); }} className="text-black hover:text-black">
                      <div className="font-medium">Projets</div>
                      <div className="text-black/70">Jetez un coup d&apos;œil à mes projets.</div>
                    </Link>
                  </NavigationMenuLink>

                  <NavigationMenuLink asChild>
                    <Link href="#outils" onClick={(e) => { e.preventDefault(); handleSelect('Outils'); }} className="text-black hover:text-black">
                      <div className="font-medium">Outils</div>
                      <div className="text-black/70">Les outils informatiques que je maîtrise.</div>
                    </Link>
                  </NavigationMenuLink>
                </li>
              </ul>
            </NavigationMenuContent>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <NavigationMenuTrigger className="text-black hover:text-white data-[state=open]:text-white">Projets</NavigationMenuTrigger>
            <NavigationMenuContent>
              <ul className="grid w-[400px] gap-2 md:w-[500px] md:grid-cols-2 lg:w-[600px] bg-white p-4 rounded-xl shadow-md">
                {projets.map((projet) => (
                  <ListItem key={projet.title} title={projet.title} href={projet.href} onClick={handleSelect}>
                    {projet.description}
                  </ListItem>
                ))}
              </ul>
            </NavigationMenuContent>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <NavigationMenuTrigger className="text-black hover:text-white data-[state=open]:text-white">Contact</NavigationMenuTrigger>
            <NavigationMenuContent>
              <ul className="grid w-[250px] gap-3 p-3 bg-white rounded-xl shadow-md">
                <li>
                  <NavigationMenuLink asChild>
                    <a href="https://github.com/HaytamL" target="_blank" rel="noopener noreferrer" className="flex items-center gap-3 text-black hover:opacity-80 transition-opacity">
                      <Image src="/github.png" alt="GitHub" width={20} height={20} /> GitHub
                    </a>
                  </NavigationMenuLink>
                </li>
                <li>
                  <NavigationMenuLink asChild>
                    <a href="https://www.linkedin.com/in/haytam-lazizi-vix-931882386/" target="_blank" rel="noopener noreferrer" className="flex items-center gap-3 text-black hover:opacity-80 transition-opacity">
                      <Image src="/linkedin-big-logo.svg" alt="LinkedIn" width={20} height={20} /> LinkedIn
                    </a>
                  </NavigationMenuLink>
                </li>
                <li>
                  <NavigationMenuLink asChild>
                    <a href="mailto:haytam.lazizi-vix@epitech.eu" className="flex items-center gap-3 text-black hover:opacity-80 transition-opacity">
                      <Image src="/contact.svg" alt="Email" width={20} height={20} /> M&apos;envoyer un email
                    </a>
                  </NavigationMenuLink>
                </li>
              </ul>
            </NavigationMenuContent>
          </NavigationMenuItem>

        </NavigationMenuList>
      </NavigationMenu>
    </div>
  );
}
