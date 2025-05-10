function darLike(id) {
    fetch('like.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'sugestao_id=' + id
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'ok') {
            const btn = document.querySelector(`li[data-id="${id}"] .like-btn`);
            if (btn) {
                btn.innerHTML = `👍 ${data.likes}`;
            }
        } else {
            alert('Ocorreu um erro ao processar seu voto.');
        }
    })
    .catch(() => {
        alert('Erro ao conectar com o servidor.');
    });
}
