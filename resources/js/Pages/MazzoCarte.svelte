<script>
    export let numCarte = 3; // numero massimo di carte selezionabili contemporaneamente

    const totCarte = 22;
    const larghezzaCarta = 100;
    const overlap = 60;

    const larghezzaTotale = larghezzaCarta + (totCarte - 1) * overlap;

    import { writable } from 'svelte/store';
    let carteSelezionate = writable([]);

    function toggleCarta(i) {
        carteSelezionate.update(selected => {
            if (selected.includes(i)) {
                return selected.filter(c => c !== i); // Se già selezionata, la deselezioniamo
            } else if (selected.length < numCarte) {
                return [...selected, i]; // Se non è selezionata e non abbiamo raggiunto il limite, la selezioniamo
            }
            return selected;
        });
    }
</script>

<main>
    <div class="carte-container" style="width:{larghezzaTotale}px;">
        {#each Array(totCarte) as _, i}
            <div
                class="carta {($carteSelezionate.includes(i)) ? 'selezionata' : ''}"
                style="left:{i * overlap}px; z-index:{($carteSelezionate.includes(i)) ? 100 : i}"
                on:click={() => toggleCarta(i)}
            />
        {/each}
    </div>
</main>

<style>
    .carte-container {
        position: relative;
        height: 220px;
        margin: 0 auto;
    }

    .carta {
        position: absolute;
        width: 100px;
        height: 180px;
        background-image: url("/images/dorso.jpg");
        background-size: cover;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: transform 0.2s ease, z-index 0.2s ease;
    }

    .carta:hover {
        transform: translateY(-20px);
    }

    .carta.selezionata {
        transform: translateY(-20px);
        z-index: 100;
    }
</style>
