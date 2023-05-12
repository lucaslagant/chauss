let links = document.querySelectorAll("[data-delete]");

//On boucle sur les liens
for (let link of links) {
    //On met un écouteur d'évènements
    link.addEventListener("click", function(e) {
        //On empeche la navigation
        e.preventDefault();

        //On demande confirmation
        if (confirm("Voulez-vous supprimer cette image ?")) {
            //On  envoie la requete ajax
            fetch(this.getAttibute("href"), {
                method: "DELETE",
                headers: {
                    "X-Request-Width": "XMLHttpRequest",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({"_token": this.dataset.token})
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.parentElement.remove();
                }
                else
                {
                    alert(data.error());
                }
            })
        }
    });
}