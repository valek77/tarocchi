<script>
    import { onMount, onDestroy } from "svelte";
    export let titolo="";
    export let angolo=0;
    export let destinazione="/";

    function navigate(){
        window.location=destinazione
    }
   
    
</script>




<div class="container d-flex align-items-center justify-content-center transition " 
     style="transform: rotate({angolo}deg) ;"
     on:click={navigate}
    
    >
    {titolo}     
</div>

<style>
   .container {
    background-color:rgba(0, 0, 0, 0.5);
    height: 20rem;
    width: 10rem;
    color:white;
    font-family: Arial, sans-serif;
    text-transform: capitalize;
    display: flex;
    justify-content: center; /* Centra orizzontalmente */
    align-items: center; /* Centra verticalmente */
    text-align: center;
    border-radius: 10px;
    }

.transition {
    transition: transform 0.3s ease-in-out;
  }
  .transition:hover {
    font-size: 24px;
    transform: scale(1.2);
    background-color:rgba(14, 29, 245, 0.5);
  }
</style>


