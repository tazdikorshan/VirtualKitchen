function validateForm(){
    const email = document.getElementById("email").value;
    const confirmEmail = document.getElementById("confirm-email").value;
    const date = document.getElementById("date").value;

    if(!checkEmails(email, confirmEmail)){
        alert("Emails do not match!");
        return false;
    }

    if(!checkDate(date)){
        alert("Please select a future date.");
        return false;
    }

    alert("Form submitted successfully!");
    return true;

    function checkEmails(Email, confirmEmail){
        return email == confirmEmail;
    }

    function checkDate(date){
        const selectDate = new Date(date);
        const today = new Date();
        return selectedDate > today;
    }
}