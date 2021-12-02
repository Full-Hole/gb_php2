

class productList {
    productBlock;
    products=[];
    loaded=[]
    lastProduct=0;
    url='/product.php';
    constructor(url){
        this.url = url;
        this.lastProduct=0;
        this.productBlock= document.querySelector(".product-section-catalog");
        this.loadProducts();
    }
    getJson(url) {
        return fetch(url)
            .then(result => result.json())
            .catch(error => {
                console.log(error + url);
                
            })
    }    
    loadProducts() {            
        this.getJson(`${this.url}?id=${this.lastProduct}`)
            .then(data => {
    
                // if (data) {
                //     products = products.concat(data);
                this.loaded=data;
                // console.log(data);
                // console.log(this.loaded);
                this.lastProduct=this.loaded[this.loaded.length-1].id;
                // console.log(this.lastProduct + ' last');
                this.parseProduct();
                //this.products = this.products.concat(data);
                    //console.log(this.products);               
                //}
            })
            .catch(error => {
                console.log(error);
            });
    }

    parseProduct(){
        this.loaded.forEach(product => {
            
            let card= `<figure class="product-card" id="${product.id}">
            <div class="product-card-hover">
            <button class="product-cart-btn">Add to&nbsp;Cart</button>
            </div>
            <img src="${product.src}" alt="feature-item" class="product-img">
            <figcaption class="product-card-text">
                <span class="product-card-text-title">${product.name}</span>
                <span class="product-card-subtitle">$ ${product.price}</span>
            </figcaption>
            </figure>`;
            this.productBlock.insertAdjacentHTML("beforeend", card);
        });

    }
    getLastProduct(){
        this.lastProduct=this.loaded[this.loaded.length-1].id_product;
    }

}

let controller = new productList("/product.php");

