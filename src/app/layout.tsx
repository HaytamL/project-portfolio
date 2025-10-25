import type { Metadata } from "next";
import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";
import Footer from "./components/Footer";

const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata: Metadata = {
  title: "Haytam Lazizi",
  description: "Portfolio",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body
        className={`${geistSans.variable} ${geistMono.variable} min-h-screen flex flex-col`}
      >
        <div className="fixed inset-0 -z-10 bg-[url('/background.svg')] bg-cover bg-center">
          <div className="absolute inset-0 backdrop-blur-md bg-black/20" />
        </div>

        <main className="flex-1 w-full flex flex-col items-center justify-center overflow-y-auto px-6 py-10">
          {children}
        </main>

        <footer className="w-full flex justify-center py-6">
          <Footer />
        </footer>
      </body>
    </html>
  );
}
