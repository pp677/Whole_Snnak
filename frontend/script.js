console.log("It works");
var jsonQ = "https://api.spoonacular.com/recipes/complexSearch?query="

function getInputValue()
        {
                var inputVal = document.getElementById("search").value;
         	let safe = jsonQ + inputVal + "&maxFat=25&number=3&apiKey=bd4900301d1b467b8d7ba3032e403773";
		console.log(safe);
		$.getJSON(safe,
        function(data){
                console.log(data);
                var image = data.results[0].image;
                console.log(image);
        var img = document.createElement("img");
                img.src = image;
                img.width = 300;
                img.heigth = 300;

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

                const node2 = document.createElement("p");
                const textnode2 = document.createTextNode(amount);
                node2.appendChild(textnode2);
                document.body.appendChild(node2);


//Second Recipe
		 var image2 = data.results[1].image;
                console.log(image2);
        var img2 = document.createElement("img");
                img2.src = image2;
                img2.width = 300;
                img2.heigth = 300;

                document.body.appendChild(img2);

                var title2 = data.results[1].title;
                console.log(title);

                const node3 = document.createElement("h1");
                const textnode3 = document.createTextNode(title2);
                node3.appendChild(textnode3);
                document.body.appendChild(node3);

        var fat2 = data.results[1].nutrition.nutrients[0];
                console.log(fat2);

                var amount2 = fat2.name + " " + fat2.amount + fat2.unit;
                console.log(amount2);

                const node4 = document.createElement("p");
                const textnode4 = document.createTextNode(amount2);
                node4.appendChild(textnode4);
                document.body.appendChild(node4);

//Third Recipe
		 var image3 = data.results[2].image;
                console.log(image3);
        var img3 = document.createElement("img");
                img3.src = image3;
                img3.width = 300;
                img3.heigth = 300;

                document.body.appendChild(img3);

                var title3 = data.results[2].title;
                console.log(title3);

                const node5 = document.createElement("h1");
                const textnode5 = document.createTextNode(title3);
                node5.appendChild(textnode5);
                document.body.appendChild(node5);

        var fat3 = data.results[2].nutrition.nutrients[0];
                console.log(fat3);

                var amount3 = fat3.name + " " + fat3.amount + fat3.unit;
                console.log(amount3);

                const node6 = document.createElement("p");
                const textnode6 = document.createTextNode(amount3);
                node6.appendChild(textnode6);
                document.body.appendChild(node6);

        }
);

        }



