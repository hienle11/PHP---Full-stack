<script>
    let productList = document.getElementById("productList");
    let totalCost = document.getElementById("totalCost");
    let totalCostGST = document.getElementById("totalCostGST");
    let addedProducts = JSON.parse(localStorage.getItem('products'));
    let cost = 0;
    let dynamicList = ``;
    if (productList && totalCost && addedProducts !== null && addedProducts.length > 0) {
        console.log(addedProducts); // DEBUG
        for (i = 0; i < addedProducts.length; i++) {
            let product = addedProducts[i];
            // console.log(product.name, product.price, product.uri); DEBUG
            dynamicList += `<li class="item d-flex justify-content-between" style="margin-left: 2rem;">
                                <div class="img-container">
                                    <img src="${product.uri}" class="img-fluid img-custom" alt="Responsive image">
                                </div>
                                <div class="d-flex align-items-top">
                                    <a style="text-decoration:none; color: black;" href="product?id=${product.id}"><h5 style="margin-top: 1rem;">${product.name}</h5></a>
                                </div>
                                <div class="d-flex flex-column  ml-auto" style="margin-right: 2rem; margin-top: 1rem;">
                                    <strong class="mb-3"> Price: $${product.price}</strong>
                                    <span class="stepper">
                                        <button class="minusQty">–</button>
                                        <input type="tel" class="qtyInput" value="${product.qty}">
                                        <button class="plusQty">+</button>
                                    </span>
                                </div>
                            </li>`;
            cost += parseFloat(product.price) * parseInt(product.qty);
        }
        productList.innerHTML = dynamicList;
        totalCost.innerHTML = cost;
        totalCostGST.innerHTML = (cost *12/11).toFixed(2);
    } else {
        productList.innerHTML = 'Your Amazorn cart is empty';
    }

    // Add event listener for checkout button
    function redirect() {
        window.location.href = "sign-in";
    }

    // Submit form
    function sendForm() {
        let loader = document.getElementById("checkoutLoader");
        let form = document.getElementById("checkoutForm");
        if (form) {
            form.style = "display:none;";
            setTimeout(() => {
                console.log("Hello");
                form.submit();
            }, 1000);

            if (loader) {
                loader.style = "margin: 0 auto;";
            }
        }
    }

    // Update constraint for choosing expired date
    function updateCurrentTime() {
        let today = new Date();
        let month = today.getMonth() + 1;
        let year = today.getFullYear();
        if (month < 10) {
            document.getElementById("expDate").min = year + "-0" + month;
        } else {
            document.getElementById("expDate").min = year + "-" + month;
        }
    }

    let checkoutBtn = document.getElementById("checkoutBtn");
    if (checkoutBtn) {
        if (addedProducts === null || addedProducts.length == 0) {
            checkoutBtn.innerHTML = '';
        }
    }

    // Cart Quantity button
    function initQtyElement(className, eventName, handler) {
        let qtyInputs = document.getElementsByClassName("qtyInput");
        let elements = document.getElementsByClassName(className);
        for (i = 0; i < elements.length; i++) {
            elements[i].addEventListener(eventName, handler(i, qtyInputs));
        }
    }

    initQtyElement("qtyInput", "input", createQtyInputHandler);
    initQtyElement("minusQty", "click", createMinusQtyHandler);
    initQtyElement("plusQty", "click", createPlusQtyHandler);


    function createQtyInputHandler(index, qtyInputs) {
        return function processQtyInput() {
            console.log(index);
            // If given input does not contain numbers
            if (qtyInputs[index].value.match(/[^0-9]/)) {
                let currentQty = qtyInputs[index].value.match(/[0-9]/g);

                if (currentQty === null) {
                    qtyInputs[index].value = '';
                } else {
                    currentQty = currentQty.join("");
                    qtyInputs[index].value = currentQty;
                }
            } else {
                if (qtyInputs[index].value > 10) {
                    console.log("Here");
                    qtyInputs[index].value = 10;
                }

                updateProductQty(index, parseInt(qtyInputs[index].value));
            }


        }
    }

    function createMinusQtyHandler(index, qtyInputs) {
        return function minusQty() {
            console.log("minus", index);
            if (qtyInputs[index].value > 0) {
                qtyInputs[index].value = (parseInt(qtyInputs[index].value) - 1).toString();
                updateProductQty(index, parseInt(qtyInputs[index].value));
            }
        }
    }

    function createPlusQtyHandler(index, qtyInputs) {
        return function plusQty() {
            console.log("plus", index);
            if (qtyInputs[index].value < 10) {
                qtyInputs[index].value = (parseInt(qtyInputs[index].value) + 1).toString();
                updateProductQty(index, parseInt(qtyInputs[index].value));
            }
        }
    }


    function updateProductQty(index, quantity) {
        let products = JSON.parse(localStorage.getItem('products'));
        if (quantity == 0) {
            products.splice(index, 1);
        } else {
            products[index]['qty'] = quantity;
        }

        localStorage.setItem('products', JSON.stringify(products));
        location.reload();
    }
</script>