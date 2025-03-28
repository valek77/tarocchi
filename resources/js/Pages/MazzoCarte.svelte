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
</script>

<main class="d-flex flex-column align-items-center">
    <Titolo testo="TAROCCHI GRATIS ONLINE"></Titolo>

    <h4 class="d-flex justify-content-center text-4xl">
        Amore, denaro, lavoro,famiglia, destino, opportunità...
    </h4>
    <div class="riquadro">
        <p class="d-flex justify-content-center text-4xl">
            Scegli le carte dal mazzo qiu sotto
        </p>
    </div>
    <div class="carte-wrapper ">
        <div class="carte-container" style="width:{larghezzaTotale}px;">
            {#each Array(totCarte) as _, i}
                <!-- svelte-ignore a11y-click-events-have-key-events -->
                <!-- svelte-ignore a11y-no-static-element-interactions -->
                <div
                    class="carta {$carteSelezionate.includes(i)
                        ? 'selezionata'
                        : ''}"
                    style="left:{i *
                        overlap}px; z-index:{$carteSelezionate.includes(i)
                        ? 100
                        : i}"
                    on:click={() => toggleCarta(i)}
                />
            {/each}
        </div>

        {#if numCarte==3}
            <div class="d-flex justify-content-center ">
                <div class="d-flex flex-column align-items-center justify-content-center ">
                    <div>scrivi la tua domanda</div>
                    <input bind:value={domanda} style="width:350px ;" />
                </div>
            </div>
        {/if}

        <button on:click={()=>alert(domanda)} >VAi avanti</button>
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
    h4 {
        font-family: "Playfair Display", serif;
        font-size: 25px;
        text-align: center;
        font-style: italic;
        letter-spacing: 1px;
        margin-bottom: 30px;
        color: rgb(250, 250, 250);
    }
    p {
        color: #ffffff;
        font-size: 18px;
        font-family: "Open Sans", sans-serif;
        font-weight: 400;
        letter-spacing: 2px;
        text-align: center;
    }
    .riquadro {
        margin: 0 auto;
        background: #d6a227;
        border-radius: 10px;
        display: table;
        padding: 5px 15px;
    }
</style>
