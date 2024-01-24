window.onload = () => {
    let carte = [];
    for (let i = 0; i < 4; i++) {
        let aus = "";
        switch (i) {
            case 0: aus = "c"; break;
            case 1: aus = "d"; break;
            case 2: aus = "h"; break;
            case 3: aus = "s"; break;
        }
        for (let j = 1; j < 13; j++) // va fino a 13 perchè i re li uso come cavalli
            carte.push("bg_" + aus + j + ".gif");

    }

    for (let i = carte.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [carte[i], carte[j]] = [carte[j], carte[i]];
    }
    document.getElementById("carte").value = carte.toString();

    initPos = [1,2,3,4];
    document.getElementById("posizioni").value = initPos.toString();
}