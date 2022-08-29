const token = document.querySelector('meta[name="csrf-token"]').content /** TOKEN **/
CountPage = 0;

let getCardsField = document.getElementById('getCardsField');

window.onload = function() {
    CardsRequest ();
}

function CardsRequest () {
    fetch(`/SearchCardsInApi/${CountPage}`, {
        headers: {
            "Content-Type": "application/json; charset=utf-8",
            "X-CSRF-Token": token
        },
        method: 'GET',  
    })
    .then(response => response.json())    
    .then(data => {
        getCardsField.innerHTML = '';
        data.ApiCardsReturn.data.forEach(item => {
            getCardsField.innerHTML +=
            `
                <div class="CardsPosition">
                    <div class="Card">
                        <div class="topCard">
                            <h2 class="nameCard">${item.name}</h2>    
                            <span class="dataCard"><i class="bi bi-star-fill"></i> ${item.level} | <i class="bi bi-info-circle"></i> ${item.type}</span>
                        </div>
                        <div class="mediaCard">
                            <img src="https://images.ygoprodeck.com/images/cards_small/${item.id}.jpg" width="150px" height="230px">
                        </div>
                        <div class="bottomCard">
                            <span class="textCard">${item.desc}</span>
                            <div class="dataPowerCard"><i class="bi bi-fire"></i> ${item.atk} / <i class="bi bi-tsunami"></i> ${item.def}</div>
                            <a href="/Cards/Show/${item.id}"><button class="ButtonDetails">VER MAIS</button></a>
                        </div>
                    </div>
                </div>
            `
        })

        CountPage++;
    })
    .catch(error => console.log(error))
}

function searchCard() {

    search = document.getElementById('search').value;
    table = document.getElementById('table');

    fetch(`/SearchCardsInApiByName/${search}`, {
        headers: {
            "Content-Type": "application/json; charset=utf-8",
            "X-CSRF-Token": token
        },
        method: 'GET',  
    })
    
    .then(response => response.json())    
    .then(data => {
        console.log(data)
        table.innerHTML = '';
        table.innerHTML += 
        `
            <th scope="row"><i class="bi bi-gear-wide"></i> ${data.realDataCard.id}</th>
            <td><a href="/Cards/Show/${data.realDataCard.id}"<i class="bi bi-arrow-through-heart"></i> ${data.realDataCard.name}</a></td>
            <td><i class="bi bi-star-fill"></i> ${data.realDataCard.level}</td>
            <td><i class="bi bi-info-circle"></i> ${data.realDataCard.type}</td>
        `
    })
    .catch(error => console.log(error))
}