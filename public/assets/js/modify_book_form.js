document.querySelector('form').querySelectorAll('select').forEach(select =>{
    var value = select.dataset.value;
    select.querySelectorAll('option').forEach(option =>{
        if( option.value == value ){
            option.setAttribute('selected', '');
        }
    })
});