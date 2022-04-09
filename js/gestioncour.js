var idFor = 0;
document.getElementById("afficher").addEventListener("click", () => {
    if (document.getElementById("formation") == null) {
        return;
    }
    let numfromation = document.getElementById("formation").value;
    $.ajax({
        url: "../php/envoicour.php",
        method: 'GET',
        data: {
            idFormation: numfromation,
            function: "affichercour"
        },
        success: (rep) => {
            idFor = numfromation;
            //Vider le block #listcour
            document.getElementById("listcour").innerHTML = "";
            if (rep == 0) {
                btnAjouter();
            } else {
                console.log(rep);
                let list = JSON.parse(rep);
                btnAjouter();
                for (const key in list) {
                    //list[key]["titre"]
                    let ligne = list[key];
                    ajouterLigne(ligne);
                }
                btnAjouter();
            }
        }
    });
});

function btnAjouter() {
    //creation d'un ligne
    let row = document.createElement("div");
    //Class "border" pour ajouter une bordur avec bootstrap
    //Class "border-dark" pour colorer les bordur en noire avec bootstrap
    row.setAttribute("class", "row border border-dark");

    //creation d'un colonne
    let col = document.createElement("div");
    col.setAttribute("class", "col-12");

    //Creation du boutton
    let btn = document.createElement("button");
    //Class "btn" pour apliquer un form boutton 
    //Class "btn-primary" pour colorier le boutton en bleu  
    btn.setAttribute("class", "btn btn-primary");
    btn.innerHTML = "+";
    //Afficher le block d'édition des cours
    btn.addEventListener("click", () => {
        document.getElementById("listcour").classList.add("d-none");
        document.getElementById("saisi").classList.remove("d-none");
    });

    //affichage de la ligne avec boutton ajouter
    col.append(btn);
    row.append(col);
    document.getElementById("listcour").append(row);
}

function ajouterLigne(ligne){
    let row = document.createElement("div");
    row.setAttribute("class", "row border border-dark");
    row.setAttribute("id",'cour_'+ligne["idCour"]);

    let col_1 = document.createElement("div");
    col_1.setAttribute("class", "col-8");

    let titre = document.createElement("p");
    titre.innerText = ligne['titre'];

    let col_2 = document.createElement("div");
    col_2.setAttribute("class", "col-2");

    let btn_1 = document.createElement("button");
    btn_1.setAttribute("class", "btn btn-info");
    btn_1.innerHTML = "Modifier";

    let col_3 = document.createElement("div");
    col_3.setAttribute("class", "col-2");

    let btn_2 = document.createElement("button");
    btn_2.setAttribute("class", "btn btn-danger");
    btn_2.setAttribute("idCour",ligne["idCour"]);
    btn_2.innerHTML = "Supprimer";
    btn_2.addEventListener("click",(e)=>{
        let idCour = e.target.getAttribute("idCour");
        $.ajax({
            url:"../php/envoicour.php",
            method :"GET",
            data :{id:idCour,function:"supprimerCour"},
            success :(rep)=>{
                if(rep == "ok"){
                    document.getElementById("cour_"+idCour).remove();
                }
                if(rep == "error"){
                    alert("Erreur");
                }
            },
            error : (err)=>{

            }
        })
    })

    col_1.append(titre);
    col_2.append(btn_1);
    col_3.append(btn_2);

    row.append(col_1);
    row.append(col_2);
    row.append(col_3);

    document.getElementById("listcour").append(row);
}

document.getElementById("ajouter").addEventListener("click", () => {
    let titre = document.getElementById("titre").value;
    let contenu = document.getElementById("contenu").value;
    if (titre == "" || contenu == "") {
        alert("Le Titre et le contenu sont des champs obligatoire");
        return;
    }
    /*
        La fonction $.ajax() permer d'envoyer des données au serveur et de recevoir une réponse
        sans actualiser le page
        la list JSON 
        => url : le lien du ficher php 
        => method : POST/GET
        => data : les donnée a envoyé au serveur
        => success : la reponse du serveur
        => error : si il y a une erreur de connexion au serveur 
    */
    $.ajax({
        url: "../php/envoicour.php",
        method: "GET",
        data: {
            idFormation: idFor,
            titreF: titre,
            contenuF: contenu,
            function: "ajouterCour"
        },
        success: (rep) => {
            if (rep == "error") {
                alert("Erreur");
                return;
            } else {
                let ligneList = document.querySelectorAll("#listcour .row.border.border-dark");
                ligneList[ligneList.length - 1].remove();
                ajouterLigne({'titre': titre , idCour : rep});
                btnAjouter();
                document.getElementById("listcour").classList.remove("d-none");
                document.getElementById("saisi").classList.add("d-none");
            }
        },
        error: (er) => {

        }
    })
})