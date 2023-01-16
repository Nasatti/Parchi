function Regione(n){
    switch(n){
        case 1:
            regione = "Lombardia";
            break;
        case 2:
            regione = "Puglia";
            break;
        case 3:
            regione = "Sardegna";
            break;
    }
    Change(regione);
}

function Change(regione){
    document.getElementById("regione").value = regione;
    document.getElementById("submit").click(); 
}

function Region(regione){
    document.getElementById("regione").value = regione;
}