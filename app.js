let cartIcon = document.querySelector('.cart-icon');
let body = document.querySelector('body');
let Close = document.querySelector('.close');
let listProductsHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let iconCartSpan = document.querySelector('.cart-icon span');

let listProducts = []; 
let carts = [];


//Cart Icon clicked
cartIcon.addEventListener('click', () =>
{
    body.classList.toggle('showCart')
})


// close button clicked
Close.addEventListener('click', () =>
{
    body.classList.toggle('showCart')
})


//Combine fetched data with html
const addDataToHTML = () => {
    listProductsHTML.innerHTML = '';
    if(listProducts.length>0){
        listProducts.forEach(element => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('item');
            newProduct.dataset.id = element.id;
            newProduct.innerHTML = `
                <img src="${element.image}" alt="">
                <h2>${element.name}</h2>
                <div class="price">$${element.price}</div>
                <button class="addCart">Buy</button>
            `;
            listProductsHTML.appendChild(newProduct);
        });
    }
}


// Buy button configuration
listProductsHTML.addEventListener('click', (event)=>{
    let positionClick = event.target;
    if(positionClick.classList.contains('addCart')){
        let productId = positionClick.parentElement.dataset.id
        addToCart(productId);
    }
})

const addToCart = (productId) =>{
    let positionInCart = carts.findIndex((value)=>value.productId == productId)
    if (carts.length<=0) {
        carts = [{
            productId : productId,
            quantity : 1
        }];
    }else if (positionInCart < 0){
        carts.push({
            productId : productId,
            quantity : 1 
        });
    }else{
        carts[positionInCart].quantity = carts[positionInCart].quantity + 1;
    }
    AddCartToHTML();
    AddCartToMemory();
}

const AddCartToHTML = () =>{
    listCartHTML.innerHTML= '';
    let totalQuantity =0;

    //updated total price here
    let totalPrice = 0;

    if (carts.length>0){
    carts.forEach(element => {
        totalQuantity = totalQuantity + element.quantity;
        let newcart = document.createElement('div');
        newcart.classList.add('item');
        newcart.dataset.id = element.productId;
        let positionProduct = listProducts.findIndex((value) => value.id == element.productId);
        let info = listProducts[positionProduct];

        //Sums up total price
        totalPrice= totalPrice + info.price * element.quantity;
        
        newcart.innerHTML = `
                <div class="image">
                <img src="${info.image}" alt="">
                </div>

                <div class="name">${info.name}</div>
                <div class="totalPrice">$${info.price * element.quantity}</div>
                <div class="quantity">
                <span class="minus"><</span>
                <span>${element.quantity}</span>
                <span class="plus">></span>
                </div>`;

                listCartHTML.appendChild(newcart);
            })

            
            // After looping through all items, add the total price to the cart
            let totalPriceElement = document.createElement('div');
            totalPriceElement.classList.add('totalPriceSummary');
            totalPriceElement.innerHTML = `
            <h3> Total Price: $${totalPrice}</h3>
            `;
            listCartHTML.appendChild(totalPriceElement);

        }

    iconCartSpan.innerText = totalQuantity;
}


//Funtion to store the cart Items as memory in json file.
AddCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(carts));
}


//Funtion to control events when the arrow signs in the carts are clicked
listCartHTML.addEventListener('click', (event) => {
    let positionClicked = event.target;
    if(positionClicked.classList.contains('minus') || positionClicked.classList.contains('plus')){
        let product_id = positionClicked.parentElement.dataset.id;
        
        let type = 'minus';
        if(positionClicked.classList.contains('plus')){
            type = 'plus';
        }

        changeQuantity(product_id, type);
    }

})

const changeQuantity = (product_id, type) =>{
    let positionItemCart = carts.findIndex((value) => value.product_id == product_id);

    if (positionItemCart >= 0) {
        switch (type) {
            case 'plus':
                carts[positionItemCart].quantity = carts[positionItemCart].quantity + 1;
                break; 

            default:
                let valueChange = carts[positionItemCart].quantity - 1;
                if (valueChange > 0) {
                    carts[positionItemCart].quantity = valueChange;
                }else{
                    carts.splice(positionItemCart , 1);
                }
                break;
        }
        
    }

    AddCartToMemory();
    AddCartToHTML();
}









const initApp = () => {
    //get data from .json
    fetch('products.json')
    .then(response => response.json())
    .then(data =>{
        listProducts = data;
        console.log(listProducts);
        addDataToHTML();


        //add cart from memory
        if(localStorage.getItem('cart')){
            carts = JSON.parse(localStorage.getItem('cart'));
            AddCartToHTML();
        }

    })
}

initApp();