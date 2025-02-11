import LinearContainer from '@/Components/Tarocchi/LinearContainer/LinearContainer'
import { Head } from '@inertiajs/react'
import React from 'react'
import GuestLayout from '@/Layouts/GuestLayout'

export default function Home() {
  return (
    <GuestLayout>
    <main className='h-screen flex flex-col justify-center'>
        <Head title='Home'></Head>
        <div  className=' debug flex flex-row justify-center '>
            <LinearContainer  />
        </div>
    </main>
    </GuestLayout>
  )
}
