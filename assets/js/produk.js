// function toggleDesc(id) {
//     const descBox = document.getElementById('descBox-' + id);
//     const arrowIcon = document.getElementById('arrowIcon-' + id);

//     if (descBox.classList.contains('hidden')) {
//         descBox.classList.remove('hidden');
//         arrowIcon.innerHTML = '▲';
//     } else {
//         descBox.classList.add('hidden');
//         arrowIcon.innerHTML = '▼';
//     }
// }

// function toggleCheckout() {
//     const modal = document.getElementById('checkoutModal');
//     modal.classList.toggle('hidden');
// }

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

function toggleCheckout() {
    const modal = document.getElementById('checkoutModal');
    modal.classList.toggle('hidden');
}