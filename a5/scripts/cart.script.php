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
                                    <h5 style="margin-top: 1.9rem;">${product.name}</h5>
                                </div>
                                <div class="d-flex flex-column  justify-content-center ml-auto" style="margin-right: 2rem;">
                                    <strong> Price: $${product.price}</strong>
                                    <button class="deleteProductBtn btn btn-danger">Delete</button>
                                </div>
                            </li>`;
            cost += parseFloat(product.price);
        }
        productList.innerHTML = dynamicList;
        totalCost.innerHTML = cost;
    } else {
        productList.innerHTML = 'Your Amazorn cart is empty';
    }

    // Add EventListener To Delete Buttons
    let deleteProductBtns = document.getElementsByClassName("deleteProductBtn"); // return an array
    if (deleteProductBtns) {
        for (i = 0; i < deleteProductBtns.length; i++) {
            console.log(i);

            deleteProductBtns[i].addEventListener("click", createHandler(i));
        }
    }

    function createHandler(n) {
        // console.log("HERE", n); DEBUG
        return function deleteProduct() {
            // console.log(n); DEBUG
            let addedProducts = JSON.parse(localStorage.getItem('products'));
            addedProducts.splice(n, 1);
            localStorage.setItem('products', JSON.stringify(addedProducts));
            location.reload();
        };
    }

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
</script>