<script>
    export let num;
    export let height="100px";
    export let isFaceDown=false;

    let imgUrl;

    if(isFaceDown)
        imgUrl="/images/dorso.jpg"
    else
        imgUrl="/images/"+num+".jpg"
    

</script>




<div style="height:{height};">

    <img style='height:100%' src={imgUrl} alt="carta"/>

</div>