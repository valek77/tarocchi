import React from 'react'
import "./CarteRow.css"
import Carta from "../Carta/Carta.js"

export default function CarteRow() {
  return (
    <div className='d-flex justify-content-around w-100'>
      <Carta/>
      <Carta/>
      <Carta/>

    </div>
  )
}
