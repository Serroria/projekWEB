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

// window.toggleDesc = function(id) {
//   const descBox = document.getElementById('descBox-' + id);
//     const arrowIcon = document.getElementById('arrowIcon-' + id);

//     if (descBox.classList.contains('show')) {
//       descBox.classList.remove('show');
//       arrowIcon.innerHTML = '▼';
//     } else {
//       descBox.classList.add('show');
//       arrowIcon.innerHTML = '▲';
//     }
// }

// function toggleCheckout() {
//     const modal = document.getElementById('checkoutModal');
//     modal.classList.toggle('show');
// }

window.toggleDesc = function(id) {
  const descBox = document.getElementById('descBox-' + id);
  const arrowIcon = document.getElementById('arrowIcon-' + id);

  if (descBox.classList.contains('show')) {
    descBox.classList.remove('show');
    descBox.classList.add('hidden');
    arrowIcon.innerHTML = '▼';
  } else {
    descBox.classList.remove('hidden');
    descBox.classList.add('show');
    arrowIcon.innerHTML = '▲';
  }
}

function toggleCheckout() {
  const modal = document.getElementById('checkoutModal');
  modal.classList.toggle('show');
}
