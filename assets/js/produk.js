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
