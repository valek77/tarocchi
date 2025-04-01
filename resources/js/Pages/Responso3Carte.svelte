<script>
    import { onMount, onDestroy } from "svelte";
    import Carta from "../Components/Carta.svelte";
    import RandomUtils from "../Utils/RandomUtils";
    import axios from "axios";


    const BASE_URL  = import.meta.env.VITE_BASE_URL;


    //Props
    export let domanda;

    //Varibili di stato
    let numeriCarta = [];
    let risposta = "";

    let showLoader = false;

    //All'avvio della pagina sorteggia tre carte
    function avvio() {
        numeriCarta = RandomUtils.getRandomUniqueIntegers(3, 0, 21);
    }

    //Chiama la funzione avvio sull onmount
    onMount(avvio);

    //Click delle carte
    async function getRipostaPassato() {
        let msg = {
            question: domanda,
            card: numeriCarta[0],
        };

        //console.log(msg);
        showLoader = true;
        const resp = await axios.post(
           BASE_URL+"/api/tarot/past",
            msg,
        );
        showLoader = false;

        //console.log(resp.data.past);
        risposta = resp.data.past;
    }

        //Click delle carte
    async function getRipostaPresente() {
        let msg = {
            question: domanda,
            past_card: numeriCarta[0],
            card: numeriCarta[1]
        };

        //console.log(msg);
        showLoader = true;
        
           const resp = await axios.post(
           BASE_URL+"/api/tarot/present",
            msg,
        );
        showLoader = false;
        
        console.log(resp.data);
        risposta = resp.data.present;
    }

    async function getRipostaFuturo() {
        let msg = {
            question: domanda,
            past_card: numeriCarta[0],
            present_card: numeriCarta[1],
            card: numeriCarta[2]
        };

        //console.log(msg);
        showLoader = true;
        
           const resp = await axios.post(
           BASE_URL+"/api/tarot/future",
            msg,
        );
        showLoader = false;
        
        console.log(resp.data);
        risposta = resp.data.future;
    }
</script>

<main>
    <div>
        <h1>Risposta 3 Carte:</h1>
        <h4 class="riquadro">Domanda:{domanda}</h4>
    </div>
    <div class="d-flex justify-content-evenly">
        <div>
            <Carta
                onClick={getRipostaPassato}
                isFaceDown={true}
                num={numeriCarta[0]}
                height="250px"
            />
            <div>
                <h4>Passato</h4>
            </div>
        </div>
        <div>
            <Carta onClick={getRipostaPresente} isFaceDown={true} num={numeriCarta[1]} height="250px" />
            <div>
                <h4>Presente</h4>
            </div>
        </div>
        <div>
            <Carta onClick={getRipostaFuturo} isFaceDown={true} num={numeriCarta[2]} height="250px" />
            <div>
                <h4>Futuro</h4>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-evenly ">
        {#if showLoader == true}
            <div class="riquadro">
                <img src="/images/loaders/loader1.gif" />
            </div>
        {:else if risposta != ""}
            <div>
                <div class="riquadro">
                    {risposta}
                </div>
            </div>
        {/if}
    </div>
</main>

<style>
    .riquadro {
        background: #1c4a69;
        color: white;
        border-radius: 10px;
        padding: 5px 15px;
        max-width: 450px;
    }
</style>
