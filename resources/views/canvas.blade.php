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
<h1>flashgame prototype</h1>

<div id="p5-container"></div>

<script>
    let characterImage; //variable to put character image in
    let shirts = []; //array for shirts
    let selectedShirt = null; //variable to track which shirt is being worn
    let characterX = 250; //variable for position charactor horizontal
    let characterY = 150; //variable for pos char vertical
    let shirtWidth = 50; //variable for shirt width
    let shirtHeight = 50; //variable for shirt height

    function preload() {
        //load image from public
        characterImage = loadImage('../images/personplaceholder.png');

        //load shirt images, and assigning x and y position,
        shirts.push({ img: loadImage('../images/shirtblue.png'), x: 50, y: 100, worn: false });
        shirts.push({ img: loadImage('../images/shirtgreen.png'), x: 50, y: 200, worn: false });
        shirts.push({ img: loadImage('../images/shirtred.png'), x: 50, y: 300, worn: false });
    }
//setup fuction to initialize canvas
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

        //if a shirt is selected, call function to draw shirt
        if (selectedShirt) {
            drawShirtOnCharacter(selectedShirt.img);
        }
    }

    //function to draw the character
    function drawCharacter() {
        image(characterImage, characterX, characterY, 100, 100); // Position and size of the character
    }

    //function to draw shirts using the assigned x and y position
    function drawShirts() {
        for (let shirt of shirts) {
            image(shirt.img, shirt.x, shirt.y, shirtWidth, shirtHeight);
        }
    }

    //fuction to draw selected shirt on the character
    function drawShirtOnCharacter(shirt) {
        // Adjust position and size of the shirt on the character as needed
        image(shirt, characterX, characterY, 100, 100); // Shirt over the character
    }

    //handle mouse click event to select or deselect a shirt
    function mousePressed() {
        for (let shirt of shirts) {
            if (mouseX > shirt.x && mouseX < shirt.x + shirtWidth &&
                mouseY > shirt.y && mouseY < shirt.y + shirtHeight) {

                //if clicked on a shirt that's already selected, deselect it (remove it)
                if (selectedShirt === shirt) {
                    selectedShirt = null;
                } else {
                    //else select this shirt to wear it
                    selectedShirt = shirt;
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
