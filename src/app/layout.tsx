import type { Metadata } from "next";
import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";
import Navbar from "./components/Navbar";
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
      <body className={`${geistSans.variable} ${geistMono.variable} antialiased relative min-h-screen`}>
        <div className="fixed inset-0 -z-10 pointer-events-none bg-[url('/background.svg')] bg-cover bg-center">
          <div className="absolute inset-0 backdrop-blur-md bg-black/10 pointer-events-none" />
        </div>
        <div className="relative z-10 w-full min-h-screen">
          <div className="absolute top-[12%] w-full flex justify-center px-4 z-10">
            <Navbar />
          </div>
          <main className="absolute top-[50%] left-0 w-full transform -translate-y-1/2 px-6 text-center sm:text-left text-white max-w-4xl mx-auto">
            {children}
          </main>
          <div className="absolute bottom-[12%] w-full flex justify-center px-4 z-10">
            <Footer />
          </div>
        </div>
      </body>
    </html>
  );
}
