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

    background:rgba(13, 48, 65, 0.867); ;
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
    border: 2px solid #d6a227;
    color:#d6a227;
  }
</style>


