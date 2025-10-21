import Image from "next/image";
import Footer from "./components/Footer";

export default function Home() {
  return (
    <div className="font-sans grid grid-rows-[1fr_auto] min-h-screen p-8 pb-20 gap-16 sm:p-20">
      <main className="flex flex-col gap-8 items-center sm:items-start">
        <h1 className="text-4xl font-bold text-white">Test</h1>
      </main>
      <Footer/>
    </div>
  );
}
