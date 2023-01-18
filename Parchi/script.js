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
         case 4:
            regione = "Toscana";
            break;
         case 5:
            regione = "Calabria";
            break;
    }
    Change(regione);
}

function Change(regione){
    document.getElementById("regione").value = regione;
    document.getElementById("submit").click(); 
}

function Set(){
    var x = document.getElementById("reg").value;
    document.getElementById("regione").value = x;
}