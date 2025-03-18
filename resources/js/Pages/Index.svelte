<script>
    import { onMount, onDestroy } from "svelte";

    import Scelta from "../Components/Scelta.svelte";

    
    const title  = import.meta.env.VITE_APP_NAME;
    export let errors;
</script>

<main>
    <h1 class="d-flex justify-content-center mt-4 font-bold text-4xl">
        {title}
    </h1>
    <div class="d-flex flex-row justify-content-center mt-5 pt-5 gap-5">
        <div class="item ">
            <Scelta  titolo="Tarocchi" angolo="-20" destinazione="/m5" /></div>
        <div class="item "> 
        <Scelta titolo="Fai una domanda" angolo="20" destinazione="/m3" /></div>
    </div>
    <h1 class="d-flex justify-content-center mt-4 font-bold text-4xl">
        Fate la vostra scelta
    </h1>
    <h4 class="d-flex justify-content-center mt-4 font-bold text-4xl">
        Lettura dei Tarocchi Gratis – Cartomanzia con IA interattiva
    </h4>
    <p class="d-flex justify-content-center mt-4 font-bold text-4xl">
        I Tarocchi sono uno strumento straordinario per aiutarci a comprendere
        il nostro punto di partenza e il percorso da intraprendere per
        raggiungere i nostri obiettivi. Il nostro sito utilizza l'intelligenza
        artificiale per offrire risposte interattive, permettendovi di esplorare
        i Tarocchi del destino gratis in modo coinvolgente e personalizzato.
        Questo vi regalerà un momento di auto-riflessione e di allineamento
        personale, aiutandovi a interpretare i messaggi delle carte con una
        guida intuitiva e innovativa.
    </p>
</main>

<style>
    h1 {
        color: rgb(126, 6, 253);
    }
    h4 {
        color: rgb(250, 250, 250);
    }
    p {
        color: rgb(250, 250, 250);
        margin-left: 400px;
        margin-right: 400px;
        text-align: center;
        margin-top: -1rem;
        margin-bottom: 2rem;
    }
</style>
