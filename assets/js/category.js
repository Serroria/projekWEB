// Filter dan Pencarian
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

// Toggle Deskripsi

window.toggleDesc = function(id) {
  const descBox = document.getElementById('descBox-' + id);
    const arrowIcon = document.getElementById('arrowIcon-' + id);

    if (descBox.classList.contains('hidden')) {
      descBox.classList.remove('hidden');
      arrowIcon.innerHTML = '▲';
    } else {
      descBox.classList.add('hidden');
      arrowIcon.innerHTML = '▼';
    }
}
//  function toggleDesc(id) {
//     const descBox = document.getElementById('descBox-' + id);
//     const arrowIcon = document.getElementById('arrowIcon-' + id);

//     if (descBox.classList.contains('hidden')) {
//       descBox.classList.remove('hidden');
//       arrowIcon.innerHTML = '▲';
//     } else {
//       descBox.classList.add('hidden');
//       arrowIcon.innerHTML = '▼';
//     }
//   }

  
  

// Inisialisasi
document.addEventListener('DOMContentLoaded', () => {
    // Filter awal
    filterProduct('all');
    
    // Event Listener untuk tombol filter
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            filterProduct(button.dataset.filter);
        });
    });
    
    // Event Listener untuk search
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-button');
    
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
