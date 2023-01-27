//SELECT ELEMENTS
const productsEl = document.querySelector(".products");
const productsEl2 = document.querySelector(".products2");
const cartItemsEl = document.querySelector(".cart-items");
const subtotalEl = document.querySelector(".subtotal");
const itemcountEl = document.querySelector(".itemcount");
const discountEl = document.querySelector(".discount");
const totalItemsInCartEl = document.querySelector(".total-items-in-cart");

//RENDER PRODUCTS
function renderProducts() {
    products.forEach((product) => {
        productsEl.innerHTML += `
            <tr>
                <td>${product.name}</td>
                <td>${product.marked_price}</td>
                <td>
                    <div class="btn btn-sm btn-primary add-to-cart" onclick="addToCart(${product.id})">
                        <i class="fa fa-plus"></i>
                    </div>
                </td>
            </tr>
        `;

    });
}

renderProducts();

//CART ARRAY
let cart = [];

//ADD TO CART
function addToCart(id) {

    if (cart.some((item) => item.id === id)) {
        changeNumberOfUnits("plus", id);
    } else {
        const item = products.find((product) => product.id === id);
        cart.push({
            ...item,
            numberOfUnits: 1,
        });
    }

    updateCart();
}


//cart update 
function updateCart() {
    renderCartItems();
    renderSubtotal();
}


//calculate and render subtotal

function renderSubtotal() {
    let totalPrice = 0,
        totalItems = 0;
        discount = 0;
    // var discount = document.getElementById("discount").value;


    cart.forEach((item) => {
        totalPrice += (item.marked_price * item.numberOfUnits);
        totalItems += item.numberOfUnits;
    });

    // totalPrice += totalPrice - discount;

    itemcountEl.innerHTML = `
        <span class="btn btn-sm btn-warning total-items-in-cart">${totalItems} items</span>
    `;

    subtotalEl.innerHTML = `
        <input type="submit" value="${totalPrice.toFixed(2)}" class="form-control btn btn-md btn-success" name="subtotal" id="subtotal">  
    `;
}

function renderCartItems() {

    cartItemsEl.innerHTML = "";

    cart.forEach((item) => {
        cartItemsEl.innerHTML += `
            <div class="cart-item">
                <div class="item-info" onclick="removeItemFromCart(${item.id})">
                    <input type="text" name="product_id[]" id="product_id" class="form-control product_id"
                                    value="${item.id}" hidden>
                    <input type="text" name="name[]" id="name" class="form-control name"
                                    value="${item.name}">
                </div>
                <div class="unit-price">
                    <input type="text" name="price[]" id="marked_price" class="form-control marked_price"
                                value="${item.marked_price}">
                    <input type="text" name="buy_price[]" id="buy_price" class="form-control buy_price"
                                value="${item.buying_price}" hidden>
                </div>
                <div class="units">
                    <div class="btn btn-sm btn-danger minus" onclick="changeNumberOfUnits('minus', ${item.id})">-</div>
                    <input type="text" name="numberOfUnits[]" id="numberOfUnits" class="form-control number numberOfUnits"
                                value="${item.numberOfUnits}">
                    <div class="btn btn-sm btn-success plus" onclick="changeNumberOfUnits('plus', ${item.id})">+</div>           
                </div>
            </div>
        `;
    });
}


//remove items form cart
function removeItemFromCart(id) {
    cart = cart.filter((item) => item.id !== id);

    updateCart();
}

//change number of units

function changeNumberOfUnits(action, id) {
    cart = cart.map((item) => {

        let numberOfUnits = item.numberOfUnits;

        if (item.id === id) {
            if (action === "minus" && numberOfUnits > 1) {
                numberOfUnits--;
            } else if (action === "plus" && numberOfUnits < item.quantity) {
                numberOfUnits++;
            }
        }

        return {
            ...item,
            numberOfUnits,
        };
    });

    updateCart();
}

