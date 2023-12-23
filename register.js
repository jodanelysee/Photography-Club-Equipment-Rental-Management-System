
function validateEmail(field) {
    if (field == "") {
        return "Enter Email\n"
    }
    else {
        const dot = field.indexOf(".") > 0
        const att = field.indexOf("@") > 0
        const pattern = /[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/.test(field)
        return (dot && att && pattern) ? "" : "Invalid Email Format\n"
    }
}

function validateFirstName(field) {
    if (field == "") {
    return "Enter First Name\n"
}
   else if (field.match(/\d+/g) != null) {
    return "Enter a Valid First Name\n";
}   
    else {
        return"";
    }
}

function validateLastName(field) {
    if (field == "") {
        return "Enter Last Name\n"
    }
       else if (field.match(/\d+/g) != null) {
        return "Enter a Valid Last Name\n";
    }   
        else {
            return"";
        }
}

function validatePassword (field) {
    return (field == "") ? "\nEnter Password\n" : ""
}

function validateRegistration (form) {
    let result = validateFirstName (form.first_name.value)
    result += validateLastName (form.last_name.value)
    result += validateEmail (form.email.value)

    result += validatePassword (form.password.value)
    if (result == "") return true
    else { alert ("Error:\n" + result); return false }
}
