'use client';

import * as React from 'react';
import Image from "next/image";
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
    href: '#job-board',
    description: "Un site permettant à des utilisateurs de postuler à des offres d'emploi.",
  },
  {
    title: 'Parking',
    href: '#parking',
    description: "Une application permettant la gestion d'un parking automatisé.",
  },
  {
    title: 'Pendu',
    href: '#pendu',
    description: "Un jeu du pendu réalisé avec Python.",
  },
  {
    title: 'Portfolio',
    href: '#portfolio',
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
    if (onClick) {
      e.preventDefault();
      onClick(title);
    }
  };

  return (
    <li>
      <NavigationMenuLink asChild>
        <a
          href={href}
          onClick={handleClick}
          className="no-underline text-black hover:opacity-80 transition-opacity"
        >
          <div className="text-sm leading-none font-medium text-black">{title}</div>
          <p className="text-black/70 line-clamp-2 text-sm leading-snug">{children}</p>
        </a>
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
    console.log("Section cliquée:", mappedKey);
    onSectionSelect?.(mappedKey);
  };

  return (
    <div className="absolute top-[12%] w-full flex justify-center px-4 z-10">
      <NavigationMenu viewport={false}>
        <NavigationMenuList className="text-black">
          <NavigationMenuItem>
            <NavigationMenuTrigger className="text-black">Accueil</NavigationMenuTrigger>
            <NavigationMenuContent>
              <ul className="grid gap-2 md:w-[400px] lg:w-[500px] lg:grid-cols-[.75fr_1fr] bg-white p-4 rounded-xl shadow-md">
                <li className="row-span-3">
                  <NavigationMenuLink asChild>
                    <a
                      href="/"
                      onClick={(e) => { e.preventDefault(); handleSelect('Accueil'); }}
                      className="flex h-full w-full flex-col justify-end rounded-md p-6 no-underline select-none hover:opacity-80"
                    >
                      <div className="mt-4 mb-2 text-lg font-medium text-black">
                        De l'idée au code... Mon portfolio
                      </div>
                      <p className="text-black/70 text-sm leading-tight">
                        Bienvenue !
                      </p>
                    </a>
                  </NavigationMenuLink>
                </li>

                <ListItem href="#formation" title="Ma formation" onClick={handleSelect}>
                  Mes diplômes, expériences pro...
                </ListItem>
                <ListItem href="#a-propos" title="À propos de moi" onClick={handleSelect}>
                  Mon histoire
                </ListItem>
                <ListItem href="/public/Haytam_Lazizi_CV.pdf" title="Mon CV" onClick={handleSelect}>
                  Cliquer pour télécharger mon CV.
                </ListItem>
              </ul>
            </NavigationMenuContent>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <NavigationMenuTrigger className="text-black">Skills</NavigationMenuTrigger>
            <NavigationMenuContent>
              <ul className="grid w-[300px] gap-4 bg-white p-4 rounded-xl shadow-md">
                <li>
                  <NavigationMenuLink asChild>
                    <a
                      href="#langages"
                      onClick={(e) => { e.preventDefault(); handleSelect('Langages'); }}
                      className="text-black"
                    >
                      <div className="font-medium">Mes langages et frameworks</div>
                      <div className="text-black/70">
                        Découvrez les langages que j'ai appris et que j'apprends actuellement.
                      </div>
                    </a>
                  </NavigationMenuLink>

                  <NavigationMenuLink asChild>
                    <a
                      href="#projets"
                      onClick={(e) => { e.preventDefault(); handleSelect('Projets'); }}
                      className="text-black"
                    >
                      <div className="font-medium">Projets</div>
                      <div className="text-black/70">Jetez un coup d'œil à mes projets.</div>
                    </a>
                  </NavigationMenuLink>

                  <NavigationMenuLink asChild>
                    <a
                      href="#outils"
                      onClick={(e) => { e.preventDefault(); handleSelect('Outils'); }}
                      className="text-black"
                    >
                      <div className="font-medium">Outils</div>
                      <div className="text-black/70">Les outils informatiques que je maîtrise.</div>
                    </a>
                  </NavigationMenuLink>
                </li>
              </ul>
            </NavigationMenuContent>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <NavigationMenuTrigger className="text-black">Projets</NavigationMenuTrigger>
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
            <NavigationMenuTrigger className="text-black">Contact</NavigationMenuTrigger>
            <NavigationMenuContent>
              <ul className="grid w-[250px] gap-3 p-3 bg-white rounded-xl shadow-md">
                <li>
                  <NavigationMenuLink asChild>
                    <a
                      href="https://github.com/HaytamL"
                      target="_blank"
                      rel="noopener noreferrer"
                      onClick={() => handleSelect('GitHub')}
                      className="flex items-center gap-3 text-black hover:opacity-80 transition-opacity"
                    >
                      <Image src="/github.svg" alt="GitHub" width={20} height={20} />
                      GitHub
                    </a>
                  </NavigationMenuLink>
                </li>
                <li>
                  <NavigationMenuLink asChild>
                    <a
                      href="https://www.linkedin.com/in/haytam-lazizi-vix-931882386/"
                      target="_blank"
                      rel="noopener noreferrer"
                      onClick={() => handleSelect('LinkedIn')}
                      className="flex items-center gap-3 text-black hover:opacity-80 transition-opacity"
                    >
                      <Image src="/linkedin-big-logo.svg" alt="LinkedIn" width={20} height={20} />
                      LinkedIn
                    </a>
                  </NavigationMenuLink>
                </li>
                <li>
                  <NavigationMenuLink asChild>
                    <a
                      href="mailto:haytam.lazizi-vix@epitech.eu"
                      onClick={() => handleSelect('Email')}
                      className="flex items-center gap-3 text-black hover:opacity-80 transition-opacity"
                    >
                      <Image src="/contact.svg" alt="Email" width={20} height={20} />
                      M'envoyer un email
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
