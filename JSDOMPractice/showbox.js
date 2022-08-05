// variables

let openBtn = document.getElementById('open-btn');
let modalContianer = document.getElementById('modal-container');
let closeBtn = document.getElementById('close-btn');

//Event Listener

openBtn.addEventListener('click', function () {
    modalContianer.style.display = 'block';
});
closeBtn.addEventListener('click', function () {

    modalContianer.style.display = 'none';
});

//在container以外的地方底點擊都會關掉modalcontainer

window.addEventListener('click', function (e) {
    if (e.target === modalContianer) {
        modalContianer.style.display = 'none';
    }
});
