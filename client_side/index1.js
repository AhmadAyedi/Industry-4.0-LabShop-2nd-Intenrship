/*document.addEventListener('DOMContentLoaded', () => {
    const products = [
        { name: 'mbot1', description: 'Description of Product 1', price: 600, imageUrl: 'images/mbot1.jpeg' },
        { name: 'mbot2', description: 'Description of Product 2', price: 600, imageUrl: 'images/mbot2.jpg' },
        { name: 'mbot3', description: 'Description of Product 3', price: 600, imageUrl: 'images/mbot3.webp' },
        { name: 'mbot4', description: 'Description of Product 4', price: 600, imageUrl: 'images/mbot4.jpeg' },
    ];

    const productsDiv = document.getElementById('products');
    products.forEach((product, index) => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <img src="${product.imageUrl}" alt="${product.name}">
            <h2>${product.name}</h2>
            <p>${product.description}</p>
            <p>Price: $${product.price}</p>
            <input type="number" id="quantity-${index}" min="1" placeholder="Quantity">
        `;
        productsDiv.appendChild(productDiv);
    });

    document.getElementById('confirmOrder').addEventListener('click', () => {
        const order = [];
        products.forEach((product, index) => {
            const quantity = document.getElementById(`quantity-${index}`).value;
            if (quantity > 0) {
                order.push({ ...product, quantity: parseInt(quantity) });
            }
        });

        if (order.length > 0) {
            localStorage.setItem('order', JSON.stringify(order));
            window.location.href = 'order.html';
        } else {
            alert('Please select at least one product.');
        }
    });
});
*/

document.addEventListener('DOMContentLoaded', () => {
    const products = [
        { 
            name: 'mBot Basic', 
            description: `
                <strong>Mechanical Material:</strong> Aluminum alloy<br>
                <strong>Process Clock Speed:</strong> 16MHz<br>
                <strong>Onboard Sensor:</strong> Buzzer, light sensor<br>
                <strong>Other Sensors:</strong> None<br>
                <strong>Coding Language:</strong> Block-based, Arduino<br>
                <p>The mBot Basic is a versatile and easy-to-use robot kit designed for beginners in robotics and coding. Its sturdy aluminum alloy frame ensures durability while being lightweight.</p>`, 
            price: 600, 
            imageUrl: 'images/mbot1.jpeg' 
        },
        { 
            name: 'mBot Ultrasonic', 
            description: `
                <strong>Mechanical Material:</strong> Aluminum alloy<br>
                <strong>Process Clock Speed:</strong> 16MHz<br>
                <strong>Onboard Sensor:</strong> Buzzer, light sensor<br>
                <strong>Other Sensors:</strong> Ultrasonic sensor<br>
                <strong>Coding Language:</strong> Block-based, Arduino<br>
                <p>The mBot Ultrasonic builds on the capabilities of the mBot Basic by adding an ultrasonic sensor, which allows it to detect and measure the distance to objects.</p>`, 
            price: 600, 
            imageUrl: 'images/mbot2.jpg' 
        },
        { 
            name: 'mBot Line Follower', 
            description: `
                <strong>Mechanical Material:</strong> Aluminum alloy<br>
                <strong>Process Clock Speed:</strong> 16MHz<br>
                <strong>Onboard Sensor:</strong> Buzzer, light sensor<br>
                <strong>Other Sensors:</strong> Line follower sensor/color sensor<br>
                <strong>Coding Language:</strong> Block-based, Arduino<br>
                <p>The mBot Line Follower is designed for applications that require precise path following. It includes a line follower sensor/color sensor in addition to the buzzer and light sensor.</p>`, 
            price: 600, 
            imageUrl: 'images/mbot3.webp' 
        },
        { 
            name: 'mBot Explorer', 
            description: `
                <strong>Mechanical Material:</strong> Aluminum alloy<br>
                <strong>Process Clock Speed:</strong> 16MHz<br>
                <strong>Onboard Sensor:</strong> Buzzer, light sensor<br>
                <strong>Other Sensors:</strong> Ultrasonic sensor, IR emitter, line follower sensor/color sensor<br>
                <strong>Coding Language:</strong> Block-based, Arduino<br>
                <p>The mBot Explorer is the most advanced model in the mBot series, featuring a comprehensive suite of sensors for enhanced functionality.</p>`, 
            price: 600, 
            imageUrl: 'images/mbot4.jpeg' 
        },
    ];

    const productsDiv = document.getElementById('products');
    products.forEach((product, index) => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <img src="${product.imageUrl}" alt="${product.name}">
            <h2>${product.name}</h2>
            <p>${product.description}</p>
            <p>Price: $${product.price}</p>
            <input type="number" id="quantity-${index}" min="1" placeholder="Quantity">
        `;
        productsDiv.appendChild(productDiv);
    });

    document.getElementById('confirmOrder').addEventListener('click', () => {
        const order = [];
        products.forEach((product, index) => {
            const quantity = document.getElementById(`quantity-${index}`).value;
            if (quantity > 0) {
                order.push({ ...product, quantity: parseInt(quantity) });
            }
        });

        if (order.length > 0) {
            localStorage.setItem('order', JSON.stringify(order));
            window.location.href = 'order.html';
        } else {
            alert('Please select at least one product.');
        }
    });
});
