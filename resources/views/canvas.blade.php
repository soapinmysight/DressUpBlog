<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.8.0/p5.js"></script>
    <title>Document</title>
</head>
<body>
<x-layout>

</x-layout>
<h1>flashgame prototype</h1>
<p>press s to save</p>
<div id="p5-container"></div>

<script>
    let characterImage; //variable to put character image in
    let characterX = 300; //variable for position character horizontal
    let characterY = 150; //variable for pos char vertical

    let clothingWidth = 50; //variable for clothing width
    let clothingHeight = 50; //variable for clothing height

    let shirts = []; //array for shirts
    let selectedShirt = null; //variable to track which shirt is being worn

    let shoes = []; //array for shoes
    let selectedShoe = null; //variable to track which shoe is being worn



    function preload() {
        //load image from public
        characterImage = loadImage('../images/personplaceholder.png');

        //load shirt images, and assigning x and y position,
        shirts.push({ img: loadImage('../images/shirtblue.png'), x: 50, y: 100, worn: false });
        shirts.push({ img: loadImage('../images/shirtgreen.png'), x: 50, y: 200, worn: false });
        shirts.push({ img: loadImage('../images/shirtred.png'), x: 50, y: 300, worn: false });

        //load shoe images, and assigning x and y position,
        shoes.push({ img: loadImage('../images/shoeblue.png'), x: 150, y: 100, worn: false });
        shoes.push({ img: loadImage('../images/shoegreen.png'), x: 150, y: 200, worn: false });
        shoes.push({ img: loadImage('../images/shoered.png'), x: 150, y: 300, worn: false });
    }
//setup function to initialize canvas
    function setup() {
        let canvas = createCanvas(600, 400);
        canvas.parent('p5-container');
    }

    function draw() {
        //draw blue background
        background(135, 206, 235);

        //call function to "draw"(display) character
        drawCharacter();

        //call function to "draw"(display) shirts
        drawShirts();

        //call function to "draw"(display) shoes
        drawShoes();

        //if a shirt is selected, call function to draw shirt
        if (selectedShirt) {
            drawShirtOnCharacter(selectedShirt.img);
        }

        //if a shoe is selected, call function to draw shoe
        if (selectedShoe) {
            drawShirtOnCharacter(selectedShoe.img);
        }
    }

    //function to draw the character
    function drawCharacter() {
        image(characterImage, characterX, characterY, 100, 100); //character position x, position y, size x and size y
    }

    //function to draw shirts using the earlier assigned x and y position
    function drawShirts() {
        for (let shirt of shirts) {
            image(shirt.img, shirt.x, shirt.y, clothingWidth, clothingHeight); //shirts position x, position y, size x and size y
        }
    }

    //function to draw shirts using the earlier assigned x and y position
    function drawShoes() {
        for (let shoe of shoes) {
            image(shoe.img, shoe.x, shoe.y, clothingWidth, clothingHeight); //shoe position x, position y, size x and size y
        }
    }

    //fuction to draw selected shirt on the character
    function drawShirtOnCharacter(shirt) {
        //make the position and size of shirt image the same as character image so the clothing fits properly
        image(shirt, characterX, characterY, 100, 100);
    }

    //fuction to draw selected shirt on the character
    function drawShoeOnCharacter(shoe) {
        //make the position and size of shoe image the same as character image so the clothing fits properly
        image(shoe, characterX, characterY, 100, 100);
    }

    //handle mouse click event to select or deselect a shirt
    function mousePressed() {
        for (let shirt of shirts) {
            //find shirt that is in the same position as the spot that was clicked
            if (mouseX > shirt.x && mouseX < shirt.x + clothingWidth &&
                mouseY > shirt.y && mouseY < shirt.y + clothingHeight) {

                //if clicked on a shirt that's already selected, deselect it (remove it)
                if (selectedShirt === shirt) {
                    selectedShirt = null;
                } else {
                    //else select this shirt to wear it
                    selectedShirt = shirt;
                }
            }
        }

        for (let shoe of shoes) {
            //find shoe that is in the same position as the spot that was clicked
            if (mouseX > shoe.x && mouseX < shoe.x + clothingWidth &&
                mouseY > shoe.y && mouseY < shoe.y + clothingHeight) {

                //if clicked on a shirt that's already selected, deselect it (remove it)
                if (selectedShoe === shoe) {
                    selectedShoe = null;
                } else {
                    //else select this shirt to wear it
                    selectedShoe = shoe;
                }
            }
        }
    }

    //if pressed on s, save canvas ass image and assign the filename "outfit"
    function keyPressed() {
        if (key === 's') {
            saveCanvas('outfit', 'png'); // Saves the canvas as a PNG image
        }
    }

</script></body>
</html>
</html>
