<script>
import Carta from "../Components/Carta.svelte";
   export let numCarte;
   const title  = import.meta.env.VITE_APP_NAME;

   $: cardHeight=Math.round((window.innerHeight / 100) * 35)+"px";
    let margin = "0px";

        
</script>

<main>
    <div>
    <h1 class="d-flex justify-content-center mt-5 font-bold text-4xl">
        {title} 
    </h1>
    <p class="font-weight-bold"> Si dvono selezionare {numCarte} carte</p>
    <div class="d-flex flex-row justify-content-center mt-5 debug" >
        {#each {length: 22} as _, i}
        
        {#if i == 0}
            {margin="0px"}
        {:else}
            {margin="-120px"}
        {/if}

        <Carta num={i} isFaceDown="true" height={cardHeight} marginLeft={margin}/>
        {/each}
      
      
    </div>
    
        Si dvono selezionare {numCarte} carte
    
    
   
</main>
<style>
    h1 {
        
        color: rgb(13, 169, 164);
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


