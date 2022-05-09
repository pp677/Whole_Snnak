var apiURL = "https://api.spoonacular.com/recipes/complexSearch?"
var jKey = "30d54b052b194028b6b933ffd24bdb19";
var sKey = "bd4900301d1b467b8d7ba3032e403773";
var pKey = "6d63ae21b55a4ac1b6c4325fba601856";
//Pass in data if you need to


function searchForRecipe(){
        let cards = document.getElementById("cards");
        cards.innerHTML = "";
        
        var inputVal = document.getElementById("search").value;
        console.log(inputVal);
        var safe = apiURL +"query="+ inputVal + "&maxFat=25&number=5&apiKey=" + sKey;
	
		$.getJSON(safe,
        function(data){
            console.log(data);
            console.log(data.results.length);
            for(let i = 0; i<data.results.length; i++){
                cards.appendChild(createCard(data.results[i]));
            }
        }
        );
}
function bmiCalc(){
    var level;
    var heightFT = document.getElementById("height").value;
    var weight = document.getElementById("weight").value;
    var gWeight = document.getElementById("goal").value;
    

    let bmr = 65+(13.75*weight)+(5*(parseInt(heightFT)));
    let gbmr = 65+(13.75*gWeight)+(5*(parseInt(heightFT)));

 

    document.getElementsByName('levels').forEach(radio=> {
        if(radio.checked){
            level = (radio.value);
        }
    })

    var amr = parseFloat(level)*bmr;
    var gamr = parseFloat(level)*gbmr;

    //onsole.log(gamr);
    if(parseInt(gamr) > parseInt(amr)){
        alert("In order to  gain: " + (gWeight-weight) +"kg");

    }else if(parseInt(gamr < amr)){
        console.log("In order to  lose: " + gWeight-weight);
    }else{
        console.log("In order to  maintain: " + gWeight-weight);
    }
    let cards = document.getElementById("cards");
        cards.innerHTML = "";
        
        var safe = apiURL + "maxFat=25&number=5&apiKey=" + sKey;
	
		$.getJSON(safe,
        function(data){
            console.log(data);
            console.log(data.results.length);
            for(let i = 0; i<data.results.length; i++){
                cards.appendChild(createCard(data.results[i]));
            }
        }
        );
    

}

function createCard(data){
    //Create Card Element
    var card = document.createElement("div");
    card.className = "card";
    card.style.width = "18rem";

    //Create Image Element
    var img = document.createElement("img");
    img.className = "card-img-top";
    img.src = data.image;
    
    //Add Image to the Card
    card.appendChild(img);

    //Create Card Body
    var cBody = document.createElement("div");
    cBody.className = "card-body";

    //Create Body Heading
    var heading = document.createElement("h5");
    heading.className = "card-title";
    heading.innerHTML = data.title;
    
    
    //Add Heading to Card Body
    cBody.appendChild(heading);

    //Add Body to Card
    card.appendChild(cBody);
    
    return card;
}
