function getRandomUniqueIntegers(n, min, max) {
    const rangeSize = max - min + 1;

    if (n > rangeSize) {
        throw new Error(
            "Non ci sono abbastanza numeri unici nell'intervallo dato.",
        );
    }

    const numbers = [];

    // Crea una lista di tutti i numeri possibili nell'intervallo
    for (let i = min; i <= max; i++) {
        numbers.push(i);
    }

    // Mescola l'array usando lo shuffle di Fisher-Yates
    for (let i = numbers.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [numbers[i], numbers[j]] = [numbers[j], numbers[i]];
    }

    // Prende i primi n numeri
    return numbers.slice(0, n);
}


export default {getRandomUniqueIntegers}