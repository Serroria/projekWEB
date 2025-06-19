function filterProduct(category) {
    const searchTerm = document.getElementById('search-input').value.trim().toLowerCase();
    applyFilters(searchTerm, category);
}

function applyFilters(searchTerm, category) {
    const products = document.querySelectorAll('.product-card');
    const activeCategory = category || document.querySelector('.button-value.active')?.dataset.filter || 'all';
    
    products.forEach(product => {
        const productName = product.querySelector('h3').textContent.toLowerCase();
        const productCategory = product.dataset.category;
        
        const matchSearch = productName.includes(searchTerm);
        const matchCategory = activeCategory === 'all' || productCategory === activeCategory;
        
        product.hidden = !(matchSearch && matchCategory);
    });
}

document.addEventListener('DOMContentLoaded', () => {

    filterProduct('all');
    
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            filterProduct(button.dataset.filter);
        });
    });
    
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search');
    
    let searchTimeout;
    searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            filterProduct(document.querySelector('.button-value.active')?.dataset.filter || 'all');
        }, 300);
    });
    
    searchButton.addEventListener('click', () => {
        filterProduct(document.querySelector('.button-value.active')?.dataset.filter || 'all');
    });
});
