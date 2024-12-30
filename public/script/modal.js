  // Fungsi untuk membuka modal
  function openModal(id) {
    document.getElementById('modal-' + id).classList.remove('hidden');
}

// Fungsi untuk menutup modal
function closeModal(id) {
    document.getElementById('modal-' + id).classList.add('hidden');
}
