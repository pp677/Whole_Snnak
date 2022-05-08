console.log("It works");
var example = "https://api.spoonacular.com/recipes/complexSearch?query="
/*$.getJSON("https://api.spoonacular.com/recipes/complexSearch?query=pasta&maxFat=25&number=3&apiKey=6d63ae21b55a4ac1b6c4325fba601856",
        function(data){
                console.log(data);
                var image = "https://spoonacular.com/recipeImages/654959-312x231.jpg";
                console.log(image);
        var img = document.createElement("img");
                img.src = image;
                img.width = 100;
                img.heigth = 100;

                document.body.appendChild(img);

                var title = data.results[0].title;
                console.log(title);

                const node = document.createElement("h1");
                const textnode = document.createTextNode(title);
                node.appendChild(textnode);
                document.body.appendChild(node);

                var fat = data.results[0].nutrition.nutrients[0];
                console.log(fat);

                var amount = fat.name + " " + fat.amount + fat.unit;
                console.log(amount);

                const node2 = document.createElement("h2");
                const textnode2 = document.createTextNode(amount);
                node2.appendChild(textnode2);
                document.body.appendChild(node2);

        }
);
*/
function getInputValue()
        {
                var inputVal = document.getElementById("search").value;
                example += inputVal + "&maxFat=25&number=3&apiKey=6d63ae21b55a4ac1b6c4325fba601856";
		console.log(example);
		$.getJSON(example,
        function(data){
                console.log(data);
                var image = "https://spoonacular.com/recipeImages/654959-312x231.jpg";
                console.log(image);
        var img = document.createElement("img");
                img.src = image;
                img.width = 100;
                img.heigth = 100;

                document.body.appendChild(img);

                var title = data.results[0].title;
                console.log(title);

                const node = document.createElement("h1");
                const textnode = document.createTextNode(title);
                node.appendChild(textnode);
                document.body.appendChild(node);

                var fat = data.results[0].nutrition.nutrients[0];
                console.log(fat);

                var amount = fat.name + " " + fat.amount + fat.unit;
                console.log(amount);

                const node2 = document.createElement("h2");
                const textnode2 = document.createTextNode(amount);
                node2.appendChild(textnode2);
                document.body.appendChild(node2);

        }
);

        }



