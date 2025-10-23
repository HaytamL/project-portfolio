'use client';

import * as React from 'react';
import Image from "next/image";
import Link from 'next/link';
import {
  NavigationMenu,
  NavigationMenuContent,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
  navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import { CircleCheckIcon, CircleHelpIcon, CircleIcon } from 'lucide-react';

const projets: { title: string; href: string; description: string }[] = [
  {
    title: 'Job Board',
    href: '/docs/alert-dialog',
    description: "Un site permettant à des utilisateurs de postuler à des offres d'emploi.",
  },
  {
    title: 'Parking',
    href: '/docs/hover-card',
    description:"Une Application permettant la gestion d'un parking automatisé.",
  },
  {
    title: 'Pendu',
    href: '/docs/progress',
    description: "Un jeu du pendu réalisé avec python."
  },
  {
    title:'Portfolio',
    href:'',
    description:"Mon portfolio."
  }
];

function ListItem({ title, children, href, ...props }: React.ComponentPropsWithoutRef<'li'> & { href: string }) {
  return (
    <li {...props}>
      <NavigationMenuLink asChild>
        <Link href={href}>
          <div className="text-sm leading-none font-medium">{title}</div>
          <p className="text-muted-foreground line-clamp-2 text-sm leading-snug">{children}</p>
        </Link>
      </NavigationMenuLink>
    </li>
  );
}

export default function Navbar() {
  return (
    <NavigationMenu viewport={false}>
      <NavigationMenuList>
        <NavigationMenuItem>
          <NavigationMenuTrigger>Accueil</NavigationMenuTrigger>
          <NavigationMenuContent>
            <ul className="grid gap-2 md:w-[400px] lg:w-[500px] lg:grid-cols-[.75fr_1fr]">
              <li className="row-span-3">
                <NavigationMenuLink asChild>
                  <Link
                    className="from-muted/50 to-muted flex h-full w-full flex-col justify-end rounded-md bg-linear-to-b p-6 no-underline outline-hidden select-none focus:shadow-md" href="/">
                    <div className="mt-4 mb-2 text-lg font-medium">De l'idée au code... Mon portfolio</div>
                    <p className="text-muted-foreground text-sm leading-tight">
                      Bienvenue !
                    </p>
                  </Link>
                </NavigationMenuLink>
              </li>
              <ListItem href="" title="Ma formation">
                Mes diplômes, expériences pro...
              </ListItem>
              <ListItem href="" title="À propos de moi">
                Mon histoire
              </ListItem>
              <ListItem href="/public/Haytam_Lazizi_CV.pdf" title="Mon CV">
                Cliquer pour télécharger mon CV.
              </ListItem>
            </ul>
          </NavigationMenuContent>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <NavigationMenuTrigger>Skills</NavigationMenuTrigger>
          <NavigationMenuContent>
            <ul className="grid w-[300px] gap-4">
              <li>
                <NavigationMenuLink asChild>
                  <Link href="#">
                    <div className="font-medium">Mes langages et frameworks</div>
                    <div className="text-muted-foreground">Découvrez les langages que j'ai appris et que j'apprends actuellement.</div>
                  </Link>
                </NavigationMenuLink>
                <NavigationMenuLink asChild>
                  <Link href="#">
                    <div className="font-medium">Projets</div>
                    <div className="text-muted-foreground">Jetez un coup d'oeil à mes projets.</div>
                  </Link>
                </NavigationMenuLink>
                <NavigationMenuLink asChild>
                  <Link href="#">
                    <div className="font-medium">Outils</div>
                    <div className="text-muted-foreground">Les outils informatiques que je maîtrise.</div>
                  </Link>
                </NavigationMenuLink>
              </li>
            </ul>
          </NavigationMenuContent>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <NavigationMenuTrigger>Projets</NavigationMenuTrigger>
          <NavigationMenuContent>
            <ul className="grid w-[400px] gap-2 md:w-[500px] md:grid-cols-2 lg:w-[600px]">
              {projets.map((projet) => (
                <ListItem key={projet.title} title={projet.title} href={projet.href}>
                  {projet.description}
                </ListItem>
              ))}
            </ul>
          </NavigationMenuContent>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <NavigationMenuTrigger>Contact</NavigationMenuTrigger>
          <NavigationMenuContent>
            <ul className="grid w-[250px] gap-3 p-3">
              <li>
                <NavigationMenuLink asChild>
                  <Link href="https://github.com/HaytamL" target="_blank" className="flex items-center gap-3 hover:opacity-80 transition-opacity">
                    <Image src="/github.svg" alt="GitHub" width={20} height={20}/>
                    GitHub
                  </Link>
                </NavigationMenuLink>
              </li>
              <li>
                <NavigationMenuLink asChild>
                  <Link href="https://www.linkedin.com/in/haytam-lazizi-vix-931882386/" target="_blank" className="flex items-center gap-3 hover:opacity-80 transition-opacity">
                    <Image src="/linkedin-big-logo.svg" alt="LinkedIn" width={20} height={20} />
                    LinkedIn
                  </Link>
                </NavigationMenuLink>
              </li>
              <li>
                <NavigationMenuLink asChild>
                  <Link href="mailto:haytam.lazizi@example.com" className="flex items-center gap-3 hover:opacity-80 transition-opacity">
                    <Image src="/contact.svg" alt="Email" width={20} height={20} />
                    M'envoyer un email
                  </Link>
                </NavigationMenuLink>
              </li>
            </ul>
          </NavigationMenuContent>
        </NavigationMenuItem>
      </NavigationMenuList>
    </NavigationMenu>
  );
}
