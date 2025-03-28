<script>
    import { onMount, onDestroy } from "svelte";

    import Scelta from "../Components/Scelta.svelte";
    import Titolo from "../Components/Titolo.svelte";
    import Carta from "../Components/Carta.svelte";
    
    export let errors;

    const appname  = import.meta.env.VITE_APP_NAME;

 
</script>

<main >
    <Titolo testo={appname}> </Titolo>
  
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
    
</main>

<style>
    
    h4 {
        color: rgb(250, 250, 250);
    }

</style>
