<?php

session_start();


if (isset($_GET['logout']) && $_GET['logout'] == '1') {
    session_destroy();
    header('Location: login.php');
    exit();
}


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Librería Online</title>
    <style>


    :root {

        --primary-color: #9A3E4E; 
        --secondary-color: #4a6572; 
        --success-color: #5a9b36; 
        --text-dark: #343a40;
        --text-light: #f8f9fa;
        --background-paper: #f9f7f4; 
    }

    body { 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        padding: 20px; 
        color: var(--text-dark);
        background-color: #e8e4db; 
        
        
        background-image: linear-gradient(rgba(240, 240, 240, 0.9), rgba(240, 240, 240, 0.9)), url('../models.php/fondo3.jpg'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

   
    header { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        background-color: var(--background-paper); 
        padding: 20px;
        margin: -20px -20px 30px -20px; 
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); 
        border-radius: 8px; 
        z-index: 10;
        position: relative;
    }
    .logo h1 {
        color: var(--primary-color); 
        margin: 0;
        font-size: 2em; 
        font-weight: 700;
    }
    .user-info { 
        display: flex; 
        align-items: center; 
        font-weight: 500;
        gap: 15px; 
    }
    .user-info .username {
        color: var(--primary-color); 
        font-style: normal;
        margin-right: 0;
        padding-right: 5px;
        border-right: 1px solid #ddd;
    }
    .user-info a { 
        text-decoration: none; 
        padding: 8px 15px;
        border-radius: 20px; 
        transition: all 0.3s ease;
        font-weight: 600;
        white-space: nowrap; 
    }
    
    #my-books-link {
        color: white !important; 
        background-color: #28a745; 
    }
    #my-books-link:hover {
        background-color: #1e7e34;
        box-shadow: 0 2px 5px rgba(40, 167, 69, 0.3);
    }
    #view-cart-link {
        color: white;
        background-color: var(--secondary-color);
    }
    #view-cart-link:hover { 
        background-color: #3b505c;
        box-shadow: 0 2px 5px rgba(74, 101, 114, 0.3);
    }
    .user-info a[href*='logout'] { 
        color: var(--secondary-color);
        background-color: transparent;
        border: 1px solid var(--secondary-color);
        padding: 7px 14px;
    }
    .user-info a[href*='logout']:hover { 
        background-color: var(--secondary-color);
        color: white;
    }


    
    h2 {
        color: var(--primary-color); 
        margin-bottom: 25px;
        font-size: 1.8em;
        border-left: none; 
        text-align: center;
        position: relative;
    }
    h2::after { 
        content: '';
        display: block;
        width: 60px;
        height: 3px;
        background: var(--primary-color); 
        margin: 10px auto 0;
        border-radius: 5px;
    }
    .section-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
        gap: 25px;
        margin-bottom: 50px;
    }
    #book-list {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
    }

    
    .book-card, .my-book-card { 
        background: var(--background-paper); 
        padding: 20px;
        border-radius: 12px; 
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #e8e4db; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
        min-height: 220px; 
    }
    .book-card:hover, .my-book-card:hover {
        transform: translateY(-8px); 
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-color); 
    }

    .book-card h3, .my-book-card h3 {
        color: var(--primary-color); 
        margin-top: 0;
        font-size: 1.5em; 
        border-bottom: 1px solid #ddd;
        padding-bottom: 8px;
        margin-bottom: 10px;
        line-height: 1.2;
    }
    .book-card p, .my-book-card p {
        margin: 5px 0;
        font-size: 1em;
        color: #555;
    }
    .book-card .price {
        font-size: 1.4em;
        font-weight: 700;
        color: var(--success-color);
        margin: 10px 0 15px;
        display: block;
    }
    
    
    button, .read-book {
        border: none;
        padding: 12px;
        border-radius: 8px; 
        cursor: pointer;
        font-weight: 700;
        transition: background-color 0.2s, transform 0.1s;
        text-align: center;
        text-decoration: none; 
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
    
    .add-to-cart {
        background-color: var(--success-color);
        color: white;
    }
    .add-to-cart:hover {
        background-color: #4b802e;
        transform: translateY(-2px);
    }

    
    .read-book {
        background-color: var(--primary-color); 
        color: white;
        margin-top: 15px; 
    }
    .read-book:hover {
        background-color: #79323E; 
        transform: translateY(-2px);
    }
    
    
    #cart-section {
        background-color: var(--background-paper);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        border-top: 5px solid var(--success-color);
    }
    #cart-content table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    #cart-content th, #cart-content td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    #cart-content th {
        background-color: #f0f0f0;
        font-weight: 600;
        color: var(--text-dark);
    }
    #cart-content tr:last-child td {
        border-bottom: none;
    }
    #cart-content button {
        background-color: #cc4444;
        color: white;
        padding: 6px 10px;
        font-size: 0.9em;
        font-weight: 500;
        border-radius: 5px;
    }
    #cart-content button:hover {
        background-color: #b33c3c;
        transform: none;
    }

    #cart-summary {
        text-align: right;
        font-size: 1.4em !important;
        font-weight: 700 !important;
        color: var(--primary-color); 
        margin-top: 25px !important;
        padding-top: 15px;
        border-top: 1px solid #ddd;
    }
    
    
    #checkout-button {
        background-color: var(--primary-color) !important; 
        font-size: 1.2em;
    }
    #checkout-button:hover {
        background-color: #79323E !important; 
    }

    
    #my-books-section {
        background-color: var(--background-paper);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        border-top: 5px solid #28a745; 
    }

   
    .search-container {
        margin-bottom: 30px;
        padding: 15px 20px;
        background-color: #fcf8f3; 
        border: 1px solid #ddd;
        border-radius: 10px; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .search-container label {
        font-weight: 700;
        color: var(--secondary-color);
        font-size: 1.1em;
    }

    .search-container #book-search {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #ccc;
        border-radius: 6px;
        font-size: 1em;
        box-sizing: border-box; 
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .search-container #book-search:focus {
        border-color: var(--primary-color); 
        box-shadow: 0 0 0 3px rgba(154, 62, 78, 0.2); 
        outline: none;
    }

    
    @media (max-width: 900px) {
        header {
            flex-direction: column;
            padding: 15px 20px;
        }
        .user-info {
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 10px;
        }
        .user-info .username {
            border-right: none;
            padding-right: 0;
            width: 100%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 1.1em;
        }
        .user-info a {
            flex-grow: 1;
            margin: 5px;
        }
        
        #cart-content th, #cart-content td {
            padding: 8px;
            font-size: 0.9em;
        }
        
       
        #cart-content table th:nth-child(3),
        #cart-content table td:nth-child(3) {
            display: none; 
        }
        
        .book-card, .my-book-card {
            min-height: auto;
        }
    }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>📚 El rincón del lector</h1>
        </div>
        <div class="user-info">
            <span class="username">Bienvenido, **<?php echo htmlspecialchars($username); ?>**!</span>
            <a href="#my-books-section" id="my-books-link">📖 Mis Libros</a>
            <a href="#cart-section" id="view-cart-link">🛒 Carrito (0)</a>
            <a href="index.php?logout=1">Cerrar Sesión</a>
        </div>
    </header>
    
    <h2>Catálogo de Libros Disponibles</h2>
    
    <div class="search-container">
        <label for="book-search">Buscar Libro por Título:</label>
        <input type="text" id="book-search" placeholder="Escribe el nombre del libro...">
    </div>
    <div id="book-list" class="section-grid">
        <p>Cargando libros...</p>
    </div>

    <section id="cart-section">
        <h2>🛒 Tu Carrito</h2>
        <div id="cart-content">
            <p>El carrito está vacío.</p>
        </div>
        <div id="cart-summary">
            Total: <span id="cart-total">$0.00</span>
        </div>
        <button id="checkout-button" disabled onclick="removeFromCart(null)">
            Finalizar Compra
        </button>
    </section>

    <section id="my-books-section" style="margin-top: 50px;">
        <h2>📖 Mis Libros Comprados</h2>
        <div id="my-books-list" class="section-grid">
            <p>Cargando tus libros...</p>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookList = document.getElementById('book-list');
            const myBooksList = document.getElementById('my-books-list'); 
            const apiURL = '../api/books.php';
            
            
            const cartLink = document.getElementById('view-cart-link');
            const cartContent = document.getElementById('cart-content');
            const cartTotal = document.getElementById('cart-total');
            const checkoutButton = document.getElementById('checkout-button');
            const cartApiURL = '../api/cart.php';
            const myBooksApiURL = '../api/mybooks.php'; 

            
            let allBooks = []; 
            const searchInput = document.getElementById('book-search');


            function renderBooks(booksToRender) {
                bookList.innerHTML = ''; 

                if (booksToRender.length === 0) {
                    bookList.innerHTML = '<p style="text-align: center; color: #cc4444; margin-top: 30px;">No se encontraron libros que coincidan con la búsqueda.</p>'; 
                    return;
                }

                booksToRender.forEach(book => {
                    const bookPrice = parseFloat(book.price); 
                    
                    const card = document.createElement('div');
                    card.classList.add('book-card');
                    card.innerHTML = `
                        <h3>${book.title}</h3>
                        <p>Autor: ${book.author}</p>
                        <p class="price">$${bookPrice.toFixed(2)}</p>
                        <button class="add-to-cart" data-book-id="${book.id}" data-book-title="${book.title}">
                            Agregar al Carrito
                        </button>
                    `;
                    bookList.appendChild(card);
                });
            }

            
            function filterBooks() {
                if (!searchInput) return; 
                const searchTerm = searchInput.value.toLowerCase();
                
                
                const filteredBooks = allBooks.filter(book => 
                    book.title.toLowerCase().includes(searchTerm)
                );
                
                renderBooks(filteredBooks);
            }
          

            function updateCartCount(count) {
                cartLink.innerHTML = `🛒 Carrito (${count})`;
                checkoutButton.disabled = count === 0;
            }

           
            window.removeFromCart = function(bookId = null) {
                const isCheckout = bookId === null;
                const message = isCheckout ? '¿Estás seguro de finalizar la compra y vaciar el carrito?' : '¿Estás seguro de eliminar este libro del carrito?';
                
                if (!confirm(message)) {
                    return;
                }

                fetch(cartApiURL, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ book_id: bookId }) 
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(isCheckout ? 'Compra finalizada con éxito! Tu biblioteca se actualizará.' : data.message);
                        loadCart(); 
                        loadMyBooks(); 
                    } else {
                        alert('Error en la operación: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error DELETE:', error);
                    alert('Error de conexión en la operación.');
                });
            }

            
            function loadCart() {
                fetch(cartApiURL)
                    .then(res => {
                        if (!res.ok && res.status !== 401) { 
                            throw new Error('Error al acceder a la API del carrito: ' + res.statusText);
                        }
                        return res.json();
                    })
                    .then(data => {
                        if (data.success && data.data) {
                            let totalItems = 0;
                            let totalPrice = 0;
                            let html = '<table><thead><tr><th>Título</th><th>Cantidad</th><th>Precio Unitario</th><th>Subtotal</th><th>Acción</th></tr></thead><tbody>';

                            data.data.forEach(item => {
                                const price = parseFloat(item.price); 
                                const quantity = parseInt(item.quantity);

                                const subtotal = price * quantity;
                                totalPrice += subtotal;
                                totalItems += quantity;
                                
                                html += `
                                    <tr>
                                        <td>${item.title}</td>
                                        <td>${quantity}</td>
                                        <td>$${price.toFixed(2)}</td>
                                        <td>$${subtotal.toFixed(2)}</td>
                                        <td><button onclick="removeFromCart(${item.book_id})">Eliminar</button></td>
                                    </tr>
                                `;
                            });
                            
                            html += '</tbody></table>';
                            cartContent.innerHTML = html;
                            cartTotal.textContent = `$${totalPrice.toFixed(2)}`;
                            updateCartCount(totalItems);

                        } else {
                            cartContent.innerHTML = '<p>El carrito está vacío.</p>';
                            cartTotal.textContent = '$0.00';
                            updateCartCount(0);
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error carrito:', error);
                        cartContent.innerHTML = `<p style="color: red;">No se pudo cargar el carrito. (${error.message})</p>`;
                        cartTotal.textContent = '$0.00';
                        updateCartCount(0);
                    });
            }

            
            function loadMyBooks() {
                fetch(myBooksApiURL)
                    .then(response => {
                        if (!response.ok && response.status !== 401) {
                            throw new Error('Error al acceder a la API de Mis Libros: ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        myBooksList.innerHTML = '';
                        
                        if (data.success && data.data.length > 0) {
                            data.data.forEach(book => {
                                
                                const encodedTitle = encodeURIComponent(book.title); 
                                
                                const card = document.createElement('div');
                                
                                card.classList.add('book-card', 'my-book-card'); 
                                card.innerHTML = `
                                    <h3>${book.title}</h3>
                                    <p>Autor: ${book.author}</p>
                                    <p>ISBN: ${book.isbn}</p>
                                    <a class="read-book" href="read.php?title=${encodedTitle}&isbn=${book.isbn}">
                                        Leer Ahora
                                    </a>
                                `;
                                myBooksList.appendChild(card);
                            });
                        } else {
                            myBooksList.innerHTML = '<p>No tienes libros comprados (simulación: el carrito está vacío). Añade algunos y finaliza la compra.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error Mis Libros:', error);
                        myBooksList.innerHTML = `<p style="color: red;">No se pudo cargar Mis Libros. (${error.message})</p>`;
                    });
            }


            

            function loadBooks() {
                fetch(apiURL)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error al acceder a la API: ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        
                        if (data.success && data.data.length > 0) {
                            allBooks = data.data; 
                            renderBooks(allBooks); 
                        } else {
                            bookList.innerHTML = '<p>No hay libros disponibles en el catálogo.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error catálogo:', error);
                        bookList.innerHTML = `<p style="color: red;">No se pudo cargar el catálogo. (${error.message})</p>`;
                    });
            }
         

            loadBooks();    
            loadCart();     
            loadMyBooks();  

           
            if(searchInput) {
                searchInput.addEventListener('input', filterBooks); 
            }
        
            bookList.addEventListener('click', function(e) {
                if (e.target.classList.contains('add-to-cart')) {
                    const button = e.target;
                    const bookId = button.getAttribute('data-book-id');
                    const bookTitle = button.getAttribute('data-book-title');

                    fetch(cartApiURL, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ book_id: bookId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(`"${bookTitle}" añadido al carrito!`);
                            loadCart(); 
                        } else {
                            alert('Error al añadir: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error al comunicarse con el carrito:', error);
                        alert('Error de conexión.');
                    });
                }
            });
            
            
            checkoutButton.addEventListener('click', function() {
                removeFromCart(null); 
            });
        });
    </script>
</body>
</html>