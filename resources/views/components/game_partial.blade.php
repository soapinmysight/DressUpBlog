<p>press s to save</p>
<div id="p5-container"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.8.0/p5.js"></script>

<script>
    let characterImage; //variable to put character image in
    let charPosX = 500; //variable for position character horizontal
    let charPosY = 150; //variable for pos char vertical
    let charSizeX = 400; //variable for position character horizontal
    let charSizeY = 400; //variable for pos char vertical

    let clothingWidth = 100; //variable for clothing width
    let clothingHeight = 100; //variable for clothing height

    let shirts = []; //array for shirts
    let selectedShirt = null; //variable to track which shirt is being worn

    let shoes = []; //array for shoes
    let selectedShoe = null; //variable to track which shoe is being worn

    let items = []; //array for items
    let selectedItem = null; //variable to track which item is being worn


    let hats = []; //array for shoes
    let selectedHat = null; //variable to track which shoe is being worn

    function preload() {
        //load image from public
        characterImage = loadImage('../images/game/cat.png');

        //load shirt images, and assigning x and y position,
        shirts.push({ img: loadImage('../images/game/clothes/shirt1.png'), x: 5, y: 5, worn: false });
        shirts.push({ img: loadImage('../images/game/clothes/shirt2.png'), x: 5, y: 105, worn: false });
        shirts.push({ img: loadImage('../images/game/clothes/shirt3.png'), x: 5, y: 205, worn: false });
        shirts.push({ img: loadImage('../images/game/clothes/shirt4.png'), x: 5, y: 305, worn: false });
        shirts.push({ img: loadImage('../images/game/clothes/shirt5.png'), x: 5, y: 405, worn: false });
        shirts.push({ img: loadImage('../images/game/clothes/shirt6.png'), x: 5, y: 505, worn: false });


        //load shoe images, and assigning x and y position,
        shoes.push({ img: loadImage('../images/game/clothes/shoe1.png'), x: 125, y: 5, worn: false });
        shoes.push({ img: loadImage('../images/game/clothes/shoe2.png'), x: 125, y: 105, worn: false });
        shoes.push({ img: loadImage('../images/game/clothes/shoe3.png'), x: 125, y: 205, worn: false });
        shoes.push({ img: loadImage('../images/game/clothes/shoe4.png'), x: 125, y: 305, worn: false });
        shoes.push({ img: loadImage('../images/game/clothes/shoe5.png'), x: 125, y: 405, worn: false });

        //load item images, and assigning x and y position,
        items.push({ img: loadImage('../images/game/clothes/item1.png'), x: 245, y: 5, worn: false });
        items.push({ img: loadImage('../images/game/clothes/item2.png'), x: 245, y: 105, worn: false });
        items.push({ img: loadImage('../images/game/clothes/item3.png'), x: 245, y: 205, worn: false });
        items.push({ img: loadImage('../images/game/clothes/item4.png'), x: 245, y: 305, worn: false });
        items.push({ img: loadImage('../images/game/clothes/item5.png'), x: 245, y: 405, worn: false });

        //load item images, and assigning x and y position,
        hats.push({ img: loadImage('../images/game/clothes/hat1.png'), x: 365, y: 5, worn: false });
        hats.push({ img: loadImage('../images/game/clothes/hat2.png'), x: 365, y: 105, worn: false });
        hats.push({ img: loadImage('../images/game/clothes/hat3.png'), x: 365, y: 205, worn: false });
        hats.push({ img: loadImage('../images/game/clothes/hat4.png'), x: 365, y: 305, worn: false });
        hats.push({ img: loadImage('../images/game/clothes/hat5.png'), x: 365, y: 405, worn: false });
    }
    //setup function to initialize canvas
    function setup() {
        let canvas = createCanvas(1000, 610);
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

        //call function to "draw"(display) items
        drawItem();

        //call function to "draw"(display) items
        drawHat();

        //if a shirt is selected, call function to draw shirt
        if (selectedShirt) {
            drawShirtOnCharacter(selectedShirt.img);
        }

        //if a shoe is selected, call function to draw shoe
        if (selectedShoe) {
            drawShoeOnCharacter(selectedShoe.img);
        }

        //if an item is selected, call function to draw shoe
        if (selectedItem) {
            drawItemOnCharacter(selectedItem.img);
        }

        //if a hat is selected, call function to draw shoe
        if (selectedHat) {
            drawHatOnCharacter(selectedHat.img);
        }
    }

    //function to draw the character
    function drawCharacter() {
        image(characterImage, charPosX, charPosY, charSizeX, charSizeY); //character position x, position y, size x and size y
    }

    //function to draw shirts using the earlier assigned x and y position
    function drawShirts() {
        for (let shirt of shirts) {
            image(shirt.img, shirt.x, shirt.y, clothingWidth, clothingHeight); //shirts position x, position y, size x and size y
        }
    }

    //function to draw shoes using the earlier assigned x and y position
    function drawShoes() {
        for (let shoe of shoes) {
            image(shoe.img, shoe.x, shoe.y, clothingWidth, clothingHeight); //shoe position x, position y, size x and size y
        }
    }

    //function to draw item using the earlier assigned x and y position
    function drawItem() {
        for (let item of items) {
            image(item.img, item.x, item.y, clothingWidth, clothingHeight); //item position x, position y, size x and size y
        }
    }

    //function to draw item using the earlier assigned x and y position
    function drawHat() {
        for (let hat of hats) {
            image(hat.img, hat.x, hat.y, clothingWidth, clothingHeight); //item position x, position y, size x and size y
        }
    }

    //function to draw selected shirt on the character
    function drawShirtOnCharacter(shirt) {
        //make the position and size of shirt image the same as character image so the clothing fits properly
        image(shirt, charPosX, charPosY, charSizeX, charSizeY);
    }

    //function to draw selected shirt on the character
    function drawShoeOnCharacter(shoe) {
        //make the position and size of shoe image the same as character image so the clothing fits properly
        image(shoe, charPosX, charPosY, charSizeX, charSizeY);
    }

    //function to draw selected shirt on the character
    function drawItemOnCharacter(item) {
        //make the position and size of shoe image the same as character image so the clothing fits properly
        image(item, charPosX, charPosY, charSizeX, charSizeY);
    }

    //function to draw selected shirt on the character
    function drawHatOnCharacter(hat) {
        //make the position and size of shoe image the same as character image so the clothing fits properly
        image(hat, charPosX, charPosY, charSizeX, charSizeY);
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

        for (let item of items) {
            //find shoe that is in the same position as the spot that was clicked
            if (mouseX > item.x && mouseX < item.x + clothingWidth &&
                mouseY > item.y && mouseY < item.y + clothingHeight) {

                //if clicked on a shirt that's already selected, deselect it (remove it)
                if (selectedItem === item) {
                    selectedItem = null;
                } else {
                    //else select this shirt to wear it
                    selectedItem = item;
                }
            }
        }

        for (let hat of hats) {
            //find hat that is in the same position as the spot that was clicked
            if (mouseX > hat.x && mouseX < hat.x + clothingWidth &&
                mouseY > hat.y && mouseY < hat.y + clothingHeight) {

                //if clicked on a hat that's already selected, deselect it (remove it)
                if (selectedHat === hat) {
                    selectedHat = null;
                } else {
                    //else select this hat to wear it
                    selectedHat = hat;
                }
            }
        }
    }

    //if pressed on s, save canvas as image (png) and assign the filename "outfit"
    function keyPressed() {
        if (key === 's') {
            saveCanvas('outfit', 'png');
        }
    }

</script>
