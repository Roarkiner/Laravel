var synopsis = document.querySelector("#synopsis");
var checkboxes = document.querySelector('.checkbox').querySelectorAll('input');

window.onload = function () {
    charLeft(synopsis);
    changeRequireCheckboxes(checkboxes);
}

synopsis.addEventListener('input', ()=>{
    charLeft(synopsis);
});

document.querySelector("input[type='submit']").addEventListener('click', ()=>{
    var style = document.createElement('style');
    style.innerHTML = ":invalid:not(form){border-style: solid;border-color: red;}";
    document.head.appendChild(style);
});

checkboxes.forEach(checkbox_event =>{
    checkbox_event.addEventListener("click", ()=>{
        changeRequireCheckboxes(checkboxes);
    });
});

function charLeft(el){
    var text = document.querySelector("#char_lim");
    text.innerHTML = 1500 - el.value.length + " characters left";
}

function changeRequireCheckboxes(el){
    var zero_checked = true;
    el.forEach(checkbox =>{
        if(checkbox.checked == true){
            zero_checked = false;
        }
    });
    if(zero_checked){
        el.forEach(checkbox =>{
            checkbox.setAttribute("required", "");
        });
    } else {
        el.forEach(checkbox =>{
            checkbox.removeAttribute("required");
        });
    }
}