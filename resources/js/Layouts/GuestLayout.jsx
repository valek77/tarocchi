import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';



export default function GuestLayout({ children }) {


    return (
        <div className="min-h-screen flex flex-col">
            {/* Menu */}
            <header className="bg-blue-600 text-white shadow-lg fixed top-0 w-full z-10">
                <div className="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
                    <div className="font-bold text-lg">
                        <Link href="/">MyApp</Link>
                    </div>
                    <nav className="space-x-4">
                        <Link href="/dashboard" className="hover:underline">Dashboard</Link>
                        <Link href="/profile" className="hover:underline">Profile</Link>
                        <Link href="/logout" method="post" className="hover:underline">Logout</Link>
                    </nav>
                </div>
            </header>

            {/* Contenuto principale */}
            <main className="flex-1 mt-16 p-4 bg-gray-100">
                {children}
            </main>

            {/* Footer opzionale */}
            <footer className="bg-gray-800 text-white text-center py-4">
                © 2025 MyApp - All rights reserved
            </footer>
        </div>
    );
}

