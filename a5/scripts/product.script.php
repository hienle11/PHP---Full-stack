<script>
    let addToCardButton = document.getElementById("addCardButton");

    if (addToCardButton) {
        addToCardButton.addEventListener("click", addProductToLocalStorage);
    }

    function addProductToLocalStorage() {
        // Get name, price, image uri in form of HTMLElement of the product
        let product_id = document.getElementById("product_id");
        let product_name = document.getElementById("product_name");
        let product_price = document.getElementById("product_price");
        let product_image = document.getElementById("product_image");

        if (product_name && product_price && product_image && product_id) {
            let id = product_id.innerHTML;
            let name = product_name.innerHTML;
            let price = product_price.innerHTML;
            let uri = product_image.src;
            // Extract the uri of the image
            uri = "images" + uri.split("images")[1];

            console.log("Saved to local storage", name, price); // DEBUG
            let products = JSON.parse(localStorage.getItem('products'));
            // If there is not any product stored in local storage
            if (products === null || products.length == 0) {
                products = [];
                let product = {
                    id: id,
                    name: name,
                    price: price,
                    uri: uri,
                    qty: 1
                };
                products.push(product);
                popUp();
            } else {
                let isExist = false;
                // Check whether the product is added to the cart based on product id
                for (i = 0; i < products.length; i++) {
                    // If yes, increase the quantity to 1
                    if (id == products[i].id) {
                        if (products[i].qty < 10) {
                            products[i].qty += 1;
                            popUp();
                        }
                        isExist = true;
                        break;
                    }
                }

                if (!isExist) {
                    let product = {
                        id: id,
                        name: name,
                        price: price,
                        uri: uri,
                        qty: 1
                    };
                    products.push(product);
                    popUp();
                }
            }
            localStorage.setItem('products', JSON.stringify(products));
        }
    }

    function popUp() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>