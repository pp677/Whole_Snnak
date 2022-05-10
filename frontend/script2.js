var apiURL = "https://api.spoonacular.com/recipes/complexSearch?query="
var jKey = "30d54b052b194028b6b933ffd24bdb19";
var sKey = "bd4900301d1b467b8d7ba3032e403773";
var pKey = "6d63ae21b55a4ac1b6c4325fba601856";
var hKey = "f7dc662afa184e58acd5c6d095374e64";
const button = document.getElementById("search");
//Pass in data if you need to


function searchForRecipe(){
        let cards = document.getElementById("cards");
        cards.innerHTML = "";
        
        var inputVal = document.getElementById("search").value;
        console.log(inputVal);
        var safe = apiURL + inputVal + "&maxFat=25&number=6&apiKey=" + hKey;
	
		$.getJSON(safe,
        function(data){
            console.log(data);
            console.log(data.results.length);
            for(let i = 0; i<data.results.length; i++){
		console.log(data.results[i]);
                cards.appendChild(createCard(data.results[i],i));
            }
        }
        );
}
function bmiCalc(){
    const message = document.getElementById("message");
        message.innerHTML="";

    var level;
    var heightFT = document.getElementById("height").value;
    var weight = document.getElementById("weight").value;
    var gWeight = document.getElementById("goal").value;
	console.log(level);

    let bmr = 65+(13.75*weight)+(5*(parseInt(heightFT)));
    let gbmr = 65+(13.75*gWeight)+(5*(parseInt(heightFT)));



    document.getElementsByName('levels').forEach(radio=> {
        if(radio.checked){
            level = (radio.value);
        }
    })

    var amr = parseFloat(level)*bmr;
    var gamr = parseFloat(level)*gbmr;

    var calorieSearch ="";
    //onsole.log(gamr);
    var mess = "In order to  gain: " + (gWeight-weight) +"kg. You will need to maintain " + gamr + " calories.";
	
	message.innerHTML = mess;

    calorieSearch = "minCalories="+ (gamr/2)-50 +"&maxCalories="+ (gamr/2)+50;
    let cards = document.getElementById("cards");
        cards.innerHTML = "";

        var safe = apiURL + calorieSearch+"&number=6&apiKey=" + hKey;
	console.log(safe);
        $.getJSON(safe,
        function(data){
            console.log(data);
            console.log(data.results.length);
            for(let i = 0; i<data.results.length; i++){
                var nutrients1 = data.results[i].nutrition;
                var fat2 = nutrients1.nutrients.calo;
                var heading = document.createElement("p");
                heading.className = "card-calorie";
                heading.innerHTML = fat2;

                cards.appendChild(createCard(data.results[i]));
            }
        }
        );


}

function createCard(data, i){
    //Create Card Element
    var card = document.createElement("div");
    card.className = "col-4 px-1 d-grid";
    //card.style.width = "18rem";

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
   
    var fat = document.createElement("p");
    var test = data.nutrition.nutrients[0];
    console.log(test);
    var amount = test.name + " " + test.amount + test.unit;
    fat.innerHTML = amount;
    fat.className = "card-text";

    
    //Add Heading to Card Body
    cBody.appendChild(heading);
    cBody.appendChild(fat);
    //Add Body to Card
    card.appendChild(cBody);
    
    return card;
}
