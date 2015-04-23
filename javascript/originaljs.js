/**
 * Created by jbyrne on 22/04/2015.
 */
function redraw()
{
//alert ("hello from redraw");
    var pizzaPrice;


// default to large
    var pizzaImageSize = 300;
    var pizzaBasePrice = 12;
    var pricePerTopping = 1;


    if (document.getElementById("small").checked)
    {

        pizzaImageSize = 150;
        pizzaBasePrice = 6;
        pricePerTopping = .5;
    }

    if (document.getElementById("medium").checked)
    {

        pizzaImageSize = 220;
        pizzaBasePrice = 10;
        pricePerTopping = 1;
    }


    document.getElementById("image1").height=pizzaImageSize;
    document.getElementById("image1").width=pizzaImageSize;
    document.getElementById("image2").height=pizzaImageSize;
    document.getElementById("image2").width=pizzaImageSize;
    document.getElementById("image3").height=pizzaImageSize;
    document.getElementById("image3").width=pizzaImageSize;
    document.getElementById("image4").height=pizzaImageSize;
    document.getElementById("image4").width=pizzaImageSize;
    document.getElementById("image5").height=pizzaImageSize;
    document.getElementById("image5").width=pizzaImageSize;
    document.getElementById("image6").height=pizzaImageSize;
    document.getElementById("image6").width=pizzaImageSize;
    document.getElementById("image7").height=pizzaImageSize;
    document.getElementById("image7").width=pizzaImageSize;

// do the toppings
    var howManyToppings = 0;

    if (document.getElementById("anchovies").checked==true)
    {
        document.getElementById("image2").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image2").style.visibility = "hidden";
    }



    if (document.getElementById("pineapple").checked==true)
    {
        document.getElementById("image3").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image3").style.visibility = "hidden";
    }





    if (document.getElementById("pepperoni").checked==true)
    {
        document.getElementById("image4").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image4").style.visibility = "hidden";
    }






    if (document.getElementById("olives").checked==true)
    {
        document.getElementById("image5").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image5").style.visibility = "hidden";
    }






    if (document.getElementById("onion").checked==true)
    {
        document.getElementById("image6").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image6").style.visibility = "hidden";
    }






    if (document.getElementById("peppers").checked==true)
    {
        document.getElementById("image7").style.visibility = "visible";
        howManyToppings = howManyToppings + 1;
    }
    else
    {
        document.getElementById("image7").style.visibility = "hidden";
    }




// calculate price

    pizzaPrice = pizzaBasePrice + pricePerTopping * howManyToppings;
    document.getElementById("pricetext").innerHTML = pizzaPrice.toString();
    document.getElementById("price").setAttribute("value", pizzaPrice.toString());


}

function validateInput ()
{
    var valid  = true;

    if (document.getElementById("cname").value == "")
    {
        valid = false;
        document.getElementById("cname").style.backgroundColor = "#ff0000";
    }
    else
    {
        document.getElementById("cname").style.backgroundColor = "#99ff99";
    }

    if (document.getElementById("caddress").value == "")
    {
        valid = false;
        document.getElementById("caddress").style.backgroundColor = "#ff0000";
    }
    else
    {
        document.getElementById("caddress").style.backgroundColor = "#99ff99";
    }


    return valid;
}


