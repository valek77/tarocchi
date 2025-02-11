import React from 'react'

export default function Carta({isCoperta=false,num, height}) {

  const [imgUrl, setImgUrl] = React.useState(isCoperta?"/images/dorso.jpg":"/images/"+num+".jpg") ;


  return (
    <div style={{height:height}}>
        
            <img style={{height:"100%"}} src={imgUrl}></img>
        
    </div>
  )
}
