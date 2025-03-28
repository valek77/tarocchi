<script>
    import { onMount, onDestroy } from "svelte";

    export let num;
    export let height = "100px";
    export let isFaceDown = false;
    export let marginLeft = "0px";
    
    let imgUrl;

    onMount(() => {
        calculateImgUrl();
    });

    function calculateImgUrl() {
        if (isFaceDown) imgUrl = "/images/dorso.jpg";
        else imgUrl = "/images/" + num + ".jpg";
    }

    function handleClick() {
        isFaceDown = !isFaceDown;
        calculateImgUrl();
    }
</script>


<div style="height:{height}; margin-left:{marginLeft} " on:click={handleClick}>
    <img style="height:100%" src={imgUrl} alt="carta" loading="lazy" />
</div>
