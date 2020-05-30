<script>
    let productList = document.getElementById("productList");
    let totalCost = document.getElementById("totalCost");
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
                                    <h5 style="margin-top: 1rem;">${product.name}</h5>
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
    } else {
        productList.innerHTML = 'Your Amazorn cart is empty';
    }

    // Add EventListener To Delete Buttons
    // let deleteProductBtns = document.getElementsByClassName("deleteProductBtn"); // return an array
    // if (deleteProductBtns) {
    //     for (i = 0; i < deleteProductBtns.length; i++) {
    //         console.log(i);

    //         deleteProductBtns[i].addEventListener("click", createHandler(i));
    //     }
    // }

    // function createHandler(n) {
    //     // console.log("HERE", n); DEBUG
    //     return function deleteProduct() {
    //         // console.log(n); DEBUG
    //         let addedProducts = JSON.parse(localStorage.getItem('products'));
    //         addedProducts.splice(n, 1);
    //         localStorage.setItem('products', JSON.stringify(addedProducts));
    //         location.reload();
    //     };
    // }

    // Add event listener for checkout button
    function redirect() {
        window.location.href = "signin.php";
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

    // let qtyInputs = document.getElementsByClassName("qtyInput");
    // for (i = 0; i < qtyInputs.length; i++) {
    //     qtyInputs[i].addEventListener("input", createQtyInputHandler(i, qtyInputs));
    // }
    // let qtyInputs = document.getElementsByClassName("qtyInput");

    // for (i = 0; i < qtyInputs.length; i++) {
    //     qtyInputs[i].addEventListener("input", createQtyInputHandler(i, qtyInputs));
    // }





    // let inc = document.getElementsByClassName("stepper");
    // for (i = 0; i < inc.length; i++) {
    //     var incI = inc[i].querySelector("input"),
    //         id = incI.getAttribute("id"),
    //         min = incI.getAttribute("min"),
    //         max = incI.getAttribute("max"),
    //         step = incI.getAttribute("step");
    //     document
    //         .getElementById(id)
    //         .previousElementSibling.setAttribute(
    //             "onclick",
    //             "stepperInput('" + id + "', -" + step + ", " + min + ")"
    //         );
    //     document
    //         .getElementById(id)
    //         .nextElementSibling.setAttribute(
    //             "onclick",
    //             "stepperInput('" + id + "', " + step + ", " + max + ")"
    //         );
    // }

    // function stepperInput(id, s, m) {
    //     var el = document.getElementById(id);
    //     if (s > 0) {
    //         if (parseInt(el.value) < m) {
    //             el.value = parseInt(el.value) + s;
    //         }
    //     } else {
    //         if (parseInt(el.value) > m) {
    //             el.value = parseInt(el.value) + s;
    //         }
    //     }
    // }
</script>