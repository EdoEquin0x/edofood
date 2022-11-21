
function generateUUID() {
  var d = new Date().getTime();
  var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
      var r = (d + Math.random()*16)%16 | 0;
      d = Math.floor(d/16);
      return (c=='x' ? r : (r&0x3|0x8)).toString(16);
  });
  return uuid;
};





// ************************************************
// Shopping Cart API
// ************************************************



var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];
    
    // Constructor
    function Item(name, id, price, count, metadata, drink1, drink2, drink3, drink4, drink5, drink6, other1, other2, other3, other4, other5, other6, pizza1, pizza2, pizza3, pizza4, pizza5, pizza6, sandwich1, sandwich2, sandwich3, sandwich4, sandwich5, sandwich6, dessert1, dessert2, dessert3, dessert4, dessert5, dessert6, sauce1, sauce2, sauce3, sauce4, sauce5, sauce6) {
      this.name = name;
      this.id = id;
      this.price = price;
      this.count = count;

      this.metadata = metadata;


      this.drink1 = drink1;
      this.drink2 = drink2;
      this.drink3 = drink3;
      this.drink4 = drink4;
      this.drink5 = drink5;
      this.drink6 = drink6;

      this.other1 = other1;
      this.other2 = other2;
      this.other3 = other3;
      this.other4 = other4;
      this.other5 = other5;
      this.other6 = other6;

      this.pizza1 = pizza1;
      this.pizza2 = pizza2;
      this.pizza3 = pizza3;
      this.pizza4 = pizza4;
      this.pizza5 = pizza5;
      this.pizza6 = pizza6;

      this.sandwich1 = sandwich1;
      this.sandwich2 = sandwich2;
      this.sandwich3 = sandwich3;
      this.sandwich4 = sandwich4;
      this.sandwich5 = sandwich5;
      this.sandwich6 = sandwich6;


      this.dessert1 = dessert1;
      this.dessert2 = dessert2;
      this.dessert3 = dessert3;
      this.dessert4 = dessert4;
      this.dessert5 = dessert5;
      this.dessert6 = dessert6;

      this.sauce1 = sauce1;
      this.sauce2 = sauce2;
      this.sauce3 = sauce3;
      this.sauce4 = sauce4;
      this.sauce5 = sauce5;
      this.sauce6 = sauce6;

      



    }
    
    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }
    
      // Load cart
    function loadCart() {
      cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
      loadCart();
    }
    
  
    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};
    
    // Add to cart
    obj.addItemToCart = function(name, id, price, count, metadata, drink1, drink2, drink3, drink4, drink5, drink6, other1, other2, other3, other4, other5, other6, pizza1, pizza2, pizza3, pizza4, pizza5, pizza6, sandwich1, sandwich2, sandwich3, sandwich4, sandwich5, sandwich6, dessert1, dessert2, dessert3, dessert4, dessert5, dessert6, sauce1, sauce2, sauce3, sauce4, sauce5, sauce6) {
      
      for(var item in cart) {
        
        if(cart[item].id === id && cart[item].metadata === metadata) {
          cart[item].count ++;
          saveCart();
          return;
        }
      }
      var item = new Item(name, id, price, 1, metadata, drink1, drink2, drink3, drink4, drink5, drink6, other1, other2, other3, other4, other5, other6, pizza1, pizza2, pizza3, pizza4, pizza5, pizza6, sandwich1, sandwich2, sandwich3, sandwich4, sandwich5, sandwich6, dessert1, dessert2, dessert3, dessert4, dessert5, dessert6, sauce1, sauce2, sauce3, sauce4, sauce5, sauce6);
      cart.push(item);
      saveCart();
    }
    // Set count from item
    obj.setCountForItem = function(id, count, metadata) {
      for(var i in cart) {
        if (cart[i].id === id && cart[item].metadata === metadata) {
          cart[i].count = count;
          break;
        }
      }
    };
    // Remove item from cart
    obj.removeItemFromCart = function(id, metadata) {
        for(var item in cart) {
          if(cart[item].id === id && cart[item].metadata === metadata) {
            cart[item].count --;
            if(cart[item].count === 0) {
              cart.splice(item, 1);
            }
            break;
          }
      }
      saveCart();
    }
    //addcounttocart
    obj.addItemCountToCart = function(id, metadata) {
        for(var item in cart) {
          if(cart[item].id === id && cart[item].metadata === metadata) {
            cart[item].count ++;
            if(cart[item].count === 0) {
              cart.splice(item, 1);
            }
            break;
          }
      }
      saveCart();
    }
  
    // Remove all items from cart
    obj.removeItemFromCartAll = function(id, metadata) {
      for(var item in cart) {
        if(cart[item].id === id && cart[item].metadata === metadata) {
          cart.splice(item, 1);
          break;
        }
      }
      saveCart();
    }
  
    // Clear cart
    obj.clearCart = function() {
      cart = [];
      saveCart();
    }
  
    // Count cart 
    obj.totalCount = function() {
      var totalCount = 0;
      for(var item in cart) {
        totalCount += cart[item].count;
      }
      return totalCount;
    }
  
    // Total cart
    obj.totalCart = function() {
      var totalCart = 0;
      for(var item in cart) {
        totalCart += cart[item].price * cart[item].count;
      }
      return Number(totalCart.toFixed(2));
    }
  
    // List cart
    obj.listCart = function() {
      var cartCopy = [];
      for(i in cart) {
        item = cart[i];
        itemCopy = {};
        for(p in item) {
          itemCopy[p] = item[p];
  
        }
        itemCopy.total = Number(item.price * item.count).toFixed(2);
        cartCopy.push(itemCopy)
      }
      return cartCopy;
    }
  
    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
  })();
  
  
  // *****************************************
  // Triggers / Events
  // ***************************************** 
  // Add item
  $('.addbutton').click(function(event) {
    event.preventDefault();

    var name = $(this).data('name');
    var price = Number($(this).data('price'));
    var id = Number($(this).data('id'));
    var metadata = generateUUID();

    var drink1 = $(".drinkcontainer0ID"+ id +" option:selected").val();
    var drink2 = $(".drinkcontainer1ID"+ id +" option:selected").val();
    var drink3 = $(".drinkcontainer2ID"+ id +" option:selected").val();
    var drink4 = $(".drinkcontainer3ID"+ id +" option:selected").val();
    var drink5 = $(".drinkcontainer4ID"+ id +" option:selected").val();
    var drink6 = $(".drinkcontainer5ID"+ id +" option:selected").val();

    var other1 = $(".othercontainer0ID"+ id +" option:selected").val();
    var other2 = $(".othercontainer1ID"+ id +" option:selected").val();;
    var other3 = $(".othercontainer2ID"+ id +" option:selected").val();;
    var other4 = $(".othercontainer3ID"+ id +" option:selected").val();;
    var other5 = $(".othercontainer4ID"+ id +" option:selected").val();;
    var other6 = $(".othercontainer5ID"+ id +" option:selected").val();;

    var pizza1 = $(".pizzacontainer0ID"+ id +" option:selected").val();
    var pizza2 = $(".pizzacontainer1ID"+ id +" option:selected").val();
    var pizza3 = $(".pizzacontainer2ID"+ id +" option:selected").val();
    var pizza4 = $(".pizzacontainer3ID"+ id +" option:selected").val();
    var pizza5 = $(".pizzacontainer4ID"+ id +" option:selected").val();
    var pizza6 = $(".pizzacontainer5ID"+ id +" option:selected").val();

    var sandwich1 = $(".sandwichcontainer0ID"+ id +" option:selected").val();
    var sandwich2 = $(".sandwichcontainer1ID"+ id +" option:selected").val();
    var sandwich3 = $(".sandwichcontainer2ID"+ id +" option:selected").val();
    var sandwich4 = $(".sandwichcontainer3ID"+ id +" option:selected").val();
    var sandwich5 = $(".sandwichcontainer4ID"+ id +" option:selected").val();
    var sandwich6 = $(".sandwichcontainer5ID"+ id +" option:selected").val();


    var sauce1 = $(".saucecontainer0ID"+ id +" option:selected").val();
    var sauce2 = $(".saucecontainer1ID"+ id +" option:selected").val();
    var sauce3 = $(".saucecontainer2ID"+ id +" option:selected").val();
    var sauce4 = $(".saucecontainer3ID"+ id +" option:selected").val();
    var sauce5 = $(".saucecontainer4ID"+ id +" option:selected").val();
    var sauce6 = $(".saucecontainer5ID"+ id +" option:selected").val();

    var dessert1 = $(".dessertcontainer0ID"+ id +" option:selected").val();
    var dessert2 = $(".dessertcontainer1ID"+ id +" option:selected").val();
    var dessert3 = $(".dessertcontainer2ID"+ id +" option:selected").val();
    var dessert4 = $(".dessertcontainer3ID"+ id +" option:selected").val();
    var dessert5 = $(".dessertcontainer4ID"+ id +" option:selected").val();
    var dessert6 = $(".dessertcontainer5ID"+ id +" option:selected").val();

      




    shoppingCart.addItemToCart(name, id, price, 1, metadata, drink1, drink2, drink3, drink4, drink5, drink6, other1, other2, other3, other4, other5, other6, pizza1, pizza2, pizza3, pizza4, pizza5, pizza6, sandwich1, sandwich2, sandwich3, sandwich4, sandwich5, sandwich6, dessert1, dessert2, dessert3, dessert4, dessert5, dessert6, sauce1, sauce2, sauce3, sauce4, sauce5, sauce6);
  

    displayCart();
  });
  
  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
  });
  
  
  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    
    for(var i in cartArray) {
      output += "<table>"
      + "<tr>"
      + "<td class='articlename'>" + cartArray[i].name + "</td>" 
      + "<td><div class='input-group'><button class='minus-item input-group-addon' data-number=" + cartArray[i].id + " data-uuid="+ cartArray[i].metadata +">-</button>"
      + "<input type='number' class='item-count form-control' data-number='" + cartArray[i].id + "' value='" + cartArray[i].count + "' data-uuid="+ cartArray[i].metadata +">"
      + "<button class='plus-item input-group-addon' data-number=" + cartArray[i].id + " data-count=" + cartArray[i].count + " data-uuid="+ cartArray[i].metadata +">+</button></div></td>"
      + "<td><button class='delete-item' data-number=" + cartArray[i].id + " data-uuid="+ cartArray[i].metadata +">X</button></td>"
      + "<td>" + cartArray[i].total + "€</td>" 
      
      + "</tr>"
      if (cartArray[i].pizza1 || cartArray[i].pizza2 || cartArray[i].pizza3 || cartArray[i].pizza4 || cartArray[i].pizza5 || cartArray[i].pizza6) {
          output += "<tr class='cartchoicelisting'>"
          + "<td class='cartchoicelistingname'>Choix Pizzas: </td>" 
        if (cartArray[i].pizza1) {
          output += "<td>" + cartArray[i].pizza1 + "</td>"
        }
        if (cartArray[i].pizza2) {
          output += "<td>" + cartArray[i].pizza2 + "</td>"
        }
        if (cartArray[i].pizza3) {
          output += "<td>" + cartArray[i].pizza3 + "</td>"
        }
        if (cartArray[i].pizza4) {
          output += "<td>" + cartArray[i].pizza4 + "</td>"
        }
        if (cartArray[i].pizza5) {
          output += "<td>" + cartArray[i].pizza5 + "</td>"
        }
        if (cartArray[i].pizza6) {
          output += "<td>" + cartArray[i].pizza6 + "</td>"
        }
        output +=  "</tr>";
      }

      if (cartArray[i].sandwich1 || cartArray[i].sandwich2 || cartArray[i].sandwich3 || cartArray[i].sandwich4 || cartArray[i].sandwich5 || cartArray[i].sandwich6) {
          output += "<tr class='cartchoicelisting'>"
          + "<td class='cartchoicelistingname'>Choix Sandwichs: </td>" 
          if (cartArray[i].sandwich1) {
            output += "<td>" + cartArray[i].sandwich1 + "</td>"
          }
          if (cartArray[i].sandwich2) {
            output += "<td>" + cartArray[i].sandwich2 + "</td>"
          }
          if (cartArray[i].sandwich3) {
            output += "<td>" + cartArray[i].sandwich3 + "</td>"
          }
          if (cartArray[i].sandwich4) {
            output += "<td>" + cartArray[i].sandwich4 + "</td>"
          }
          if (cartArray[i].sandwich5) {
            output += "<td>" + cartArray[i].sandwich5 + "</td>"
          }
          if (cartArray[i].sandwich6) {
            output += "<td>" + cartArray[i].sandwich6 + "</td>"
          }
          output +=  "</tr>";
      }

      if (cartArray[i].other1 || cartArray[i].other2 || cartArray[i].other3 || cartArray[i].other4 || cartArray[i].other5 || cartArray[i].other6) {
          output += "<tr class='cartchoicelisting'>"
          + "<td class='cartchoicelistingname'>Choix Accompagnements: </td>" 
          if (cartArray[i].other1) {
            output += "<td>" + cartArray[i].other1 + "</td>"
          }
          if (cartArray[i].other2) {
            output += "<td>" + cartArray[i].other2 + "</td>"
          }
          if (cartArray[i].other3) {
            output += "<td>" + cartArray[i].other3 + "</td>"
          }
          if (cartArray[i].other4) {
            output += "<td>" + cartArray[i].other4 + "</td>"
          }
          if (cartArray[i].other5) {
            output += "<td>" + cartArray[i].other5 + "</td>"
          }
          if (cartArray[i].other6) {
            output += "<td>" + cartArray[i].other6 + "</td>"
          }
          output +=  "</tr>";
        }


        if (cartArray[i].dessert1 || cartArray[i].dessert2 || cartArray[i].dessert3 || cartArray[i].dessert4 || cartArray[i].dessert5 || cartArray[i].dessert6) {
          output += "<tr class='cartchoicelisting'>"
          + "<td class='cartchoicelistingname'>Choix Desserts: </td>" 
          if (cartArray[i].dessert1) {
            output += "<td>" + cartArray[i].dessert1 + "</td>"
          }
          if (cartArray[i].dessert2) {
            output += "<td>" + cartArray[i].dessert2 + "</td>"
          }
          if (cartArray[i].dessert3) {
            output += "<td>" + cartArray[i].dessert3 + "</td>"
          }
          if (cartArray[i].dessert4) {
            output += "<td>" + cartArray[i].dessert4 + "</td>"
          }
          if (cartArray[i].dessert5) {
            output += "<td>" + cartArray[i].dessert5 + "</td>"
          }
          if (cartArray[i].dessert6) {
            output += "<td>" + cartArray[i].dessert6 + "</td>"
          }
          output +=  "</tr>";
        }

        if (cartArray[i].sauce1 || cartArray[i].sauce2 || cartArray[i].sauce3 || cartArray[i].sauce4 || cartArray[i].sauce5 || cartArray[i].sauce6) {
          output += "<tr class='cartchoicelisting'>"
          + "<td class='cartchoicelistingname'>Choix Sauces: </td>" 
          if (cartArray[i].sauce1) {
            output += "<td>" + cartArray[i].sauce1 + "</td>"
          }
          if (cartArray[i].sauce2) {
            output += "<td>" + cartArray[i].sauce2 + "</td>"
          }
          if (cartArray[i].sauce3) {
            output += "<td>" + cartArray[i].sauce3 + "</td>"
          }
          if (cartArray[i].sauce4) {
            output += "<td>" + cartArray[i].sauce4 + "</td>"
          }
          if (cartArray[i].sauce5) {
            output += "<td>" + cartArray[i].sauce5 + "</td>"
          }
          if (cartArray[i].sauce6) {
            output += "<td>" + cartArray[i].sauce6 + "</td>"
          }
          output +=  "</tr>";
        }


        if (cartArray[i].drink1 || cartArray[i].drink2 || cartArray[i].drink3 || cartArray[i].drink4 || cartArray[i].drink5 || cartArray[i].drink6) {
          output += "<tr class='cartchoicelisting'>"
          + "<td class='cartchoicelistingname'>Choix Boissons: </td>" 
          if (cartArray[i].drink1) {
            output += "<td>" + cartArray[i].drink1 + "</td>"
          }
          if (cartArray[i].drink2) {
            output += "<td>" + cartArray[i].drink2 + "</td>"
          }
          if (cartArray[i].drink3) {
            output += "<td>" + cartArray[i].drink3 + "</td>"
          }
          if (cartArray[i].drink4) {
            output += "<td>" + cartArray[i].drink4 + "</td>"
          }
          if (cartArray[i].drink5) {
            output += "<td>" + cartArray[i].drink5 + "</td>"
          }
          if (cartArray[i].drink6) {
            output += "<td>" + cartArray[i].drink6 + "</td>"
          }
        }
        output +=  "</table>";






    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart() + '€');
    $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function(event) {
    var id = $(this).data('number');
    var metadata = $(this).data('uuid');
    shoppingCart.removeItemFromCartAll(id, metadata);
    

    displayCart();
  })
  
  
  // -1
  $('.show-cart').on("click", ".minus-item", function(event) {
    var id = $(this).data('number');
    var metadata = $(this).data('uuid');
    shoppingCart.removeItemFromCart(id, metadata);
    displayCart();
  })
  // +1
  $('.show-cart').on("click", ".plus-item", function(event) {
    var id = $(this).data('number');
    var metadata = $(this).data('uuid');
    shoppingCart.addItemCountToCart(id, metadata);
    displayCart();
  })
  
  // Item count input
  $('.show-cart').on("change", ".item-count", function(event) {
     var id = $(this).data('number');
     var count = Number($(this).val());
     var metadata = $(this).data('uuid');
     shoppingCart.setCountForItem(id, metadata, count);
    displayCart();
  });
  
  displayCart();
  