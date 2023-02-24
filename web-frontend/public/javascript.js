/*---lang selector---*/

var languages = ["de", "fr", "en",];    //all the languages that the website can be translated in

changeLang(); //Default

function changeLang(language = "de") {
    if (!languages.includes(language)) { return false; }

    languages.forEach(l => {
        Array.from(document.getElementsByClassName(l)).forEach(e => {
            e.style.display = (l == language) ? "inline" : "none";
        })
    });
}

/*---lang selector---*/
/*---index page---*/

function background_img_1_on()  //increases the opacity on hover
{
    if (window.innerHeight < window.innerWidth)  //only when the device has a bigger width than its height
    {
        document.getElementById('img_1').style = "opacity: 0.3; transition-duration: 0.5s;";
    }
}

function background_img_2_on()  //increases the opacity on hover
{
    if (window.innerHeight < window.innerWidth)  //only when the device has a bigger width than its height
    {
        document.getElementById('img_2').style = "opacity: 0.3; transition-duration: 0.5s;";
    }
}

function background_img_3_on()  //increases the opacity on hover
{
    if (window.innerHeight < window.innerWidth)  //only when the device has a bigger width than its height
    {
        document.getElementById('img_3').style = "opacity: 0.3; transition-duration: 0.5s;";
    }
}

function background_img_4_on()  //increases the opacity on hover
{
    if (window.innerHeight < window.innerWidth)  //only when the device has a bigger width than its height
    {
        document.getElementById('img_4').style = "opacity: 0.3; transition-duration: 0.5s;";
    }
}

function background_img_5_on()  //increases the opacity on hover
{
    if (window.innerHeight < window.innerWidth)  //only when the device has a bigger width than its height
    {
        document.getElementById('img_5').style = "opacity: 0.3; transition-duration: 0.5s;";
    }
}

function background_img_6_on()  //increases the opacity on hover
{
    if (window.innerHeight < window.innerWidth)  //only when the device has a bigger width than its height
    {
        document.getElementById('img_6').style = "opacity: 0.3; transition-duration: 0.5s;";
    }
}



function background_img_off()   //makes all images invisible as soon as none of the images is being hovered
{
    if (window.innerHeight < window.innerWidth)  //only when the device has a bigger width than its height
    {
        document.getElementById('img_1').style = "opacity: 0; transition-duration: 0.5s;";
        document.getElementById('img_2').style = "opacity: 0; transition-duration: 0.5s;";
        document.getElementById('img_3').style = "opacity: 0; transition-duration: 0.5s;";
        document.getElementById('img_4').style = "opacity: 0; transition-duration: 0.5s;";
        document.getElementById('img_5').style = "opacity: 0; transition-duration: 0.5s;";
        document.getElementById('img_6').style = "opacity: 0; transition-duration: 0.5s;";
    }
}

/*---index page---*/
/*---impressum---*/

function open_impressum()   //opens the modal as soon as the "a" tag is clicked "slides from the top to the middle of the page"
{
    document.getElementById('impressum').style = "visibility: visible; transform: translateY(0%); transition-duration: 1s;";    //shows the modal
    document.getElementById('impressum_shadow').style = "visibility: visible; opacity: 1; transition-duration: 0.5s;";          //adds a dark background
}

function close_impressum()  //closes the modal as soon as the "x" image on the top right corner is clicked "slides form the middle to the top"
{
    document.getElementById('impressum').style = "visibility: hidden; transform: translateY(-100%); transition-duration: 1s;";  //hides the modal
    document.getElementById('impressum_shadow').style = "visibility: hidden; opacity: 0; transition-duration: 0.5s;";           //removes the dark bakground
}

/*---impressum---*/
/*---all pages---*/

function open_links()   //opens the navbar for smaller devices when the hamburger menu image is clicked
{
    document.getElementById('menu_display').style = "visibility: visible; transform: translateX(0%); transition-duration: 0.5s; opacity: 1;";   //slides from the left to the right
}

function close_links()  //closes the navbar when the "x" image at the top of the navbar is clicked
{
    document.getElementById('menu_display').style = "visibility: hidden; transform: translateX(-100%); transition-duration: 0.5s; opacity: 0;"; //slides from the right to the left
}

/*---all pages---*/
/*---demo page---*/

function background_img_1_opacity_up()  //increases the opacity of the background image that is on the section when the section is hovered
{
    if (window.innerHeight < window.innerWidth) {
        document.getElementById('img_1').style = "opacity: 0.9; transition-duration: 0.5s;";
    }
}

function background_img_2_opacity_up()  //increases the opacity of the background image that is on the section when the section is hovered
{
    if (window.innerHeight < window.innerWidth) {
        document.getElementById('img_2').style = "opacity: 0.9; transition-duration: 0.5s;";
    }
}



function background_img_opacity_down()  //sets the opacity of the background image back to the previous opacity amount when none of the sections is being hovered
{
    if (window.innerHeight < window.innerWidth) {
        document.getElementById('img_1').style = "opacity: 0.3; transition-duration: 0.5s;";
        document.getElementById('img_2').style = "opacity: 0.3; transition-duration: 0.5s;";
    }
}



function go_back()  //this is a button that is located at the bottom left. This button is only visible on the demos that are displayed on the "demos page". It allows the user to go back to the "demos" page
{
    location.pathname = "/demos.html";  //goes back to "demos" page
}

/*---demo page---*/