<script>
    import { onMount, onDestroy } from "svelte";
    //import ResizeObserver from "svelte-resize-observer";
    import Carta from "./Carta.svelte";

    export let title;
    export let errors;

    $: cardHeight=Math.round((window.innerHeight / 100) * 35)+"px";
    let mainReference;

        onDestroy(() => {
        console.log("Component unmounted!");
    });


   
    
</script>



<main bind:this={mainReference}>
    <h1 class="block mt-4 font-bold text-4xl">{title}</h1>
    <div class="d-flex flex-row justify-content-evenly" >
        <Carta  num="5" isFaceDown="true" height={cardHeight} />
        <Carta num="2" height={cardHeight}  />
        <Carta num="7" height={cardHeight} />
    </div>
</main>

<style>
    h1 {
        color: red;
    }
</style>
