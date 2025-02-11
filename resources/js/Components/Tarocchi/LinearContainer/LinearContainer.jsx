import React from 'react';
import "./LinearContainer.css";
import { motion } from 'framer-motion';
import Carta from '../Carta/Carta';

export default function LinearContainer({}) {
    const tarotCards = Array.from({ length: 21 }, (_, i) => i );

      const [height, setHeigth] = React.useState(0);
      const [width, setWidth]   = React.useState(70*22);
    
      React.useEffect(()=>{
        let h = Math.round( window.innerHeight /100 *25);
        setHeigth(h+"px")
    
      },[])

    return (
        <div style={{height:height , width:width}} className=" linear-container debug-blue">
            {tarotCards.map((num, index) => (
                <motion.div
                    key={num}
                    className="absolute card-motion"
                    initial={{ x: 0, opacity: 0 }}
                    animate={{ x: index * 70, opacity: 1 }}  // Ogni carta si sposta di 50px verso destra
                    transition={{
                        delay: index * 0.1,
                        duration: 0.6,
                        type: "spring",
                        stiffness: 70
                    }}
                >
                    <Carta num={num} height={height} isCoperta={true} />
                </motion.div>
            ))}
        </div>
    );
}
