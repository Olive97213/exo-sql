

function updateElements(selectedValue) {
    var emailElement = document.querySelector('#customerEmail');
    var selectedOption = document.querySelector('option[value="' + selectedValue + '"]');
    var selectedEmail = selectedOption.getAttribute('data-email');
    emailElement.textContent = selectedEmail;

    var nameElement = document.querySelector('#customerName');
    var selectedOption = document.querySelector('option[value="' + selectedValue + '"]');
    var selectedName = selectedOption.getAttribute('data-name');
    nameElement.textContent = selectedName;
}