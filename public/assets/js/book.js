var dark_background = document.querySelector('.background-dark');
var book_detail = document.querySelector('.book-detail');
var delete_buttons = document.querySelectorAll('.delete-button');

delete_buttons.forEach((delete_button) => {
    delete_button.addEventListener('mouseenter', (el)=>{
        el.target.setAttribute('src', 'assets/img/red_delete.svg');
    });
    
    delete_button.addEventListener('mouseout', (el)=>{
        el.target.setAttribute('src', 'assets/img/delete.svg');
    });
});

document.querySelectorAll('.title-td').forEach((title_td) => {
    title_td.addEventListener('click', (el) =>{
        el = el.target;
        dark_background.classList.toggle('none');
        book_detail.classList.toggle('none');
        document.querySelector("#title-detail").innerHTML = el.innerHTML;
        document.querySelector("#author-detail").innerHTML = el.dataset.author;
        document.querySelector("#parution-detail").innerHTML = el.dataset.publication_year;
        document.querySelector("#genre-detail").innerHTML = el.dataset.genre;
        document.querySelector("#synopsis-detail").innerHTML = el.dataset.synopsis;
    });
});

document.querySelector('.background-dark').addEventListener('click', (el)=>{
    closeDetail();
});

document.querySelector('#close-icon').addEventListener('click', (el)=>{
    closeDetail();
})

function closeDetail(){
    dark_background.classList.toggle('none');
    book_detail.classList.toggle('none');
}