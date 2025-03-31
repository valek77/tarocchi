<script>
    import { onMount, onDestroy } from "svelte";

    export let num;
    export let height = "100px";
    export let isFaceDown = false;
    export let marginLeft = "0px";

    export let onClick=null;
    
    let imgUrl;

    onMount(() => {
        calculateImgUrl();
    });

    function calculateImgUrl() {
        if (isFaceDown) imgUrl = "/images/dorso.jpg";
        else imgUrl = "/images/" + num + ".jpg";
    }

    function handleClick() {
        if(!isFaceDown) return;

        if(onClick!=null)
            onClick();
        
        isFaceDown = !isFaceDown;
        calculateImgUrl();
    }
</script>


<!-- svelte-ignore a11y-no-static-element-interactions -->
<!-- svelte-ignore a11y-click-events-have-key-events -->
<div style="height:{height}; margin-left:{marginLeft} " on:click={handleClick}>
    <img style="height:100%" src={imgUrl} alt="carta" loading="lazy" />
</div>
