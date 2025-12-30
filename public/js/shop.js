document.addEventListener('submit', function (e) {
    const form = e.target.closest('form.add-to-cart');
    if (!form) return;

    e.preventDefault();

    const url = form.action;
    const formData = new FormData(form);

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        // update mini cart UI
        const miniCartBody = document.getElementById('mini-cart-body');
        miniCartBody.innerHTML = '';
        Object.values(data.cart || {}).forEach(item => {
            miniCartBody.innerHTML += `
                <div class="d-flex gap-2 mb-2">
                    ${item.image
                        ? `<img src="/storage/uploads/products/${item.image}" width="50">`
                        : `<div class="bg-light" style="width:50px;height:50px"></div>`
                    }
                    <div>
                        <strong>${item.name}</strong><br>
                        ${item.quantity} × $${item.price}
                    </div>
                </div>`;
        });
        // show mini cart
        document.getElementById('mini-cart').classList.add('open');
    })
    .catch(err => console.error(err));
});
function closeMiniCart() {
    document.getElementById('mini-cart').classList.remove('open');
}

// attach event
document.getElementById('closeMiniCart').addEventListener('click', closeMiniCart);


document.addEventListener('DOMContentLoaded', function() {
    const miniCart = document.getElementById('mini-cart');
    const miniCartBody = document.getElementById('mini-cart-body');
    const cartLink = document.getElementById('cartDropdown');

    // Open mini cart when navbar icon is clicked
    cartLink.addEventListener('click', function(e) {
        e.preventDefault();

        // Optional: populate mini cart from server/session if needed
        fetch('/cart/json') // you can make a route that returns current cart JSON
            .then(res => res.json())
            .then(data => {
                miniCartBody.innerHTML = '';

                if(data.cart && Object.keys(data.cart).length > 0){
                    Object.values(data.cart).forEach(item => {
                        const div = document.createElement('div');
                        div.classList.add('d-flex', 'gap-2', 'mb-2');
                        div.innerHTML = `
                            ${item.image ? `<img src="/storage/uploads/products/${item.image}" width="50" class="rounded">` 
                                         : `<div class="bg-light" style="width:50px;height:50px;"></div>`}
                            <div>
                                <strong>${item.name}</strong><br>
                                ${item.quantity} × $${parseFloat(item.price).toFixed(2)}
                            </div>
                        `;
                        miniCartBody.appendChild(div);
                    });
                } else {
                    miniCartBody.innerHTML = '<p class="text-muted">Your cart is empty</p>';
                }

                miniCart.style.transform = 'translateX(0)'; // slide in
            });
    });
});
