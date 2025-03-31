<script>
    import { onMount, onDestroy } from "svelte";
    import Carta from "../Components/Carta.svelte";
    import RandomUtils from "../Utils/RandomUtils";

    import CardUtils from "../Utils/CardUtils";



    //Varibili di stato
    let numeriCarta=[];

    



    //All'avvio della pagina sorteggia tre carte
    function avvio() {
         numeriCarta = RandomUtils.getRandomUniqueIntegers(5, 0,21);
    }

    //Chiama la funzione avvio sull onmount
    onMount(avvio);

</script>
<main>
    <div>
        <h1>Risposta 5 Carte:</h1>
       
    </div>
    <div class="d-flex justify-content-evenly">
        <div>
            <Carta isFaceDown={true} num={numeriCarta[0]} height="250px" />
            <div>
                <h4>{CardUtils.nomiCarte[numeriCarta[0]]}</h4>
            </div>
        </div>
        <div>
            <Carta isFaceDown={true} num={numeriCarta[1]} height="250px" />
            <div>
                <h4>{CardUtils.nomiCarte[numeriCarta[1]]}</h4>
            </div>
        </div>
        <div>
            <Carta isFaceDown={true} num={numeriCarta[2]} height="250px" />
            <div>
                <h4>{CardUtils.nomiCarte[numeriCarta[2]]}</h4>
            </div>
        </div>
        <div>
            <Carta isFaceDown={true} num={numeriCarta[3]} height="250px" />
            <div>
                <h4>{CardUtils.nomiCarte[numeriCarta[3]]}</h4>
            </div>
        </div>
        <div>
            <Carta isFaceDown={true} num={numeriCarta[4]} height="250px" />
            <div>
                <h4>{CardUtils.nomiCarte[numeriCarta[4]]}</h4>
            </div>
        </div>
    </div>
</main>


<div>
 <h1>   Risposta 5 Carte:  </h1>
   
</div>