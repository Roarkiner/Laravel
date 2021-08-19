var synopsis = document.querySelector("#synopsis");

window.onload = function () {
    var text = document.querySelector("#char_lim");
    text.innerHTML = 1500 - synopsis.value.length + " characters left";
}

synopsis.addEventListener('input', (el)=>{
    el = el.target;
    var text = document.querySelector("#char_lim");
    text.innerHTML = 1500 - el.value.length + " characters left";
});

document.querySelector("input[type='submit']").addEventListener('click', ()=>{
    var style = document.createElement('style');
    style.innerHTML = ":invalid:not(form){border-style: solid;border-color: red;}";
    document.head.appendChild(style);
});