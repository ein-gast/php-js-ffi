import './bootstrap';

import {validateName} from './validator.js';

function onReady() {
    document.getElementById('form').addEventListener('submit', onFormSubmit)
}
    
function onFormSubmit(ev){
    let data = new FormData(ev.target)
    if(!data.get('do_validate')) {
        return
    }
    
    let error = validateName(data.get('name'))
    if(error.length>0) {
        event.preventDefault()
        displayErrors([error])
    }
}

function displayErrors(errors) {
    let elements =[]
    for(let message of errors){
        let el = document.createElement('li')
        el.innerText = message
        elements.push(el)
    }
    document.getElementById('frontend_err').replaceChildren(...elements)
    document.getElementById('backend_err').replaceChildren()
}

document.addEventListener('DOMContentLoaded', onReady)