<script>
    import { writable } from "svelte/store";
    import Titolo from "../Components/Titolo.svelte";

    export let numCarte = 3;
    const title = import.meta.env.VITE_APP_NAME;
    const totCarte = 22;
    const larghezzaCarta = 100;
    const overlap = 60;

    const larghezzaTotale = larghezzaCarta + (totCarte - 1) * overlap;

    let carteSelezionate = writable([]);
    let domanda ;

    function toggleCarta(i) {
        carteSelezionate.update((selected) => {
            if (selected.includes(i)) {
                return selected.filter((c) => c !== i); // Se già selezionata, la deselezioniamo
            } else if (selected.length < numCarte) {
                return [...selected, i]; // Se non è selezionata e non abbiamo raggiunto il limite, la selezioniamo
            }
            return selected;
        });
    }


    function naviga(){
        if(numCarte==3) 
            window.location="/r3?domanda="+encodeURIComponent(domanda);
        else
            window.location="/r5";
    }
</script>

<main class="d-flex flex-column align-items-center">
    <Titolo testo="TAROCCHI GRATIS ONLINE"></Titolo>

    <h4 class="d-flex justify-content-center ">
        Amore, denaro, lavoro,famiglia, destino, opportunità...
    </h4>
    <div class="">
        <h4>
            Scegli le carte dal mazzo qiu sotto
        </h4>
    </div>
    <div class="carte-wrapper ">
        <div class="carte-container" style="width:{larghezzaTotale}px;">
            {#each Array(totCarte) as _, i}
                <!-- svelte-ignore a11y-click-events-have-key-events -->
                <!-- svelte-ignore a11y-no-static-element-interactions -->
                <div
                    class="carta {$carteSelezionate.includes(i)  ? 'selezionata'  : ''}"
                    style="left:{i * overlap}px; z-index:{$carteSelezionate.includes(i) ? 100 : i}"
                    on:click={() => toggleCarta(i)}
                />
            {/each}
        </div>

        {#if numCarte==3}
            <div class="d-flex justify-content-center  ">
                <div class="d-flex flex-column align-items-center justify-content-center  ">
                    <div><h4>Scrivi la tua domanda</h4></div>
                    <input class="domanda_input" bind:value={domanda} />
                </div>
            </div>
        {/if}
    <div class="d-flex flex-column align-items-center justify-content-center mt-5 ">
        <button disabled={carteSelezionate.length<numCarte || !domanda} class="bottone " on:click={naviga} >
           Vai avanti
        </button>
    </div>
    </div>
</main>

<style>
    .carte-wrapper {
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        margin-top: 50px;
       
    }

    .carte-container {
        position: relative;
        height: 220px;
        margin: 0 auto;
       
    }

    .carta {
        position: absolute;
        width: 105px;
        height: 187px;
        background-image: url("/images/dorso.jpg");
        background-size: contain;

        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition:
            transform 0.2s ease,
            z-index 0.2s ease;
    }

    .carta:hover {
        transform: translateY(20px);
    }

    .carta.selezionata {
        transform: translateY(20px);
        z-index: 100;
    }


    .bottone {
        background: #d6a227;
        color:white;
        border-radius: 10px;
        padding: 5px 15px;
        font-size: 24px;
    }
    .bottone:hover {
    background-color: #1c4a69;
    transform: scale(1.05);
  }

  .domanda_input{
    background-color: beige;
    color:#1c4a69;
    width:350px ;
    font-size: 22px;
    outline: none;
    }

 
</style>
