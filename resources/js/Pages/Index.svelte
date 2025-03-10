<script>
    import { onMount, onDestroy } from "svelte";
    import ResizeObserver from "svelte-resize-observer";
    import Carta from "./Carta.svelte";

    export let title;
    export let errors;

    let cardHeight;
    let mainReference;

    onMount(() => {
      //  let tmp = Math.round((window.innerHeight / 100) * 35);
       // cardHeight = tmp + "px";
    });

    onDestroy(() => {
        console.log("Component unmounted!");
    });

    function onResize({ detail }) {
      //  width = detail.width;
      //  height = detail.height;

        let tmp = Math.round((window.innerHeight / 100) * 35);
        cardHeight = tmp + "px";
    }
</script>

<ResizeObserver elementResize={mainReference} on:resize={onResize} />

<main bind:this={mainReference}>
    <h1 class="block mt-4 font-bold text-4xl">{title}</h1>
    <div class="d-flex flex-row justify-content-evenly">
        <Carta num="5" isFaceDown="true" height={cardHeight} />
        <Carta num="2" height={cardHeight} />
        <Carta num="7" height={cardHeight} />
    </div>
</main>

<style>
    h1 {
        color: red;
    }
</style>
