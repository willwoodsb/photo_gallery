//--------------------------------------------------------
//------------------Form Validation-----------------------
//--------------------------------------------------------

const input = $('input:not([type=submit]), textarea');
const email = $('input[type = email]');


function notempty(target) {
    if (target.value == "") {
        $(`#${target.id} + .error`).show();
        return false
    } else {
        return true;
    }
}


function validateEmail(userInput) {
    let emailRegex = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    if (!emailRegex.test(userInput.value)) {
        $(`#email + .error`).show();
        return false;
    } else {
        return true;
    };
}
    
input.on('change', function (event) {
    $(`#${event.target.id} + .error`).hide();
    valid = true;
});

function submitForm(userInput){
    validateEmail(userInput.email);
    notempty(userInput.fname);
    notempty(userInput.lname);
    notempty(userInput.message);
    notempty(userInput.subject);
    if(validateEmail(userInput.email)
        && notempty(userInput.fname)
        && notempty(userInput.lname)
        && notempty(userInput.message)
        && notempty(userInput.message)) {
        return true;
        
    } else {
        return false;
    }
}

