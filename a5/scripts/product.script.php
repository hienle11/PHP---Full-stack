<script>
    let addToCardButton = document.getElementById("addCardButton");

    if (addToCardButton) {
        addToCardButton.addEventListener("click", addObjectToLocalStorage);
    }

    function addObjectToLocalStorage() {
        let myStorage = window.localStorage;
        let product_name = document.getElementById("product_name");
        let product_price = document.getElementById("product_price");
        let product_image = document.getElementById("product_image");

        if (product_name && product_price && product_image) {
            let name = product_name.innerHTML;
            let price = product_price.innerHTML;
            let uri = product_image.src;
            uri = "images" + uri.split("images")[1];
            console.log("Saved to local storage", name, price);
            let products = JSON.parse(localStorage.getItem('products'));
            let product = {
                name: name,
                price: price,
                uri: uri
            };

            if (products === null) {
                products = [];
            }
            products.push(product);
            localStorage.setItem('products', JSON.stringify(products));
        }
    }
</script>