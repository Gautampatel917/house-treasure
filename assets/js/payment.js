document.addEventListener('DOMContentLoaded', function () {
    const paymentForm = document.querySelector('form');
    const cardNumberInput = document.getElementById('card-number');
    const expiryDateInput = document.getElementById('expiry-date');
    const cvvInput = document.getElementById('cvv');

    // Format Card Number Input
    cardNumberInput.addEventListener('input', function (e) {
        const value = e.target.value.replace(/\D/g, '');  // Remove non-digits
        e.target.value = value.replace(/(\d{4})(?=\d)/g, '$1 '); // Add space every 4 digits
    });

    // Format Expiry Date Input
    expiryDateInput.addEventListener('input', function (e) {
        const value = e.target.value.replace(/\D/g, '');  // Remove non-digits
        if (value.length >= 3) {
            e.target.value = value.slice(0, 2) + '/' + value.slice(2);
        } else {
            e.target.value = value;
        }
    });

    // Validate CVV Input
    cvvInput.addEventListener('input', function (e) {
        const value = e.target.value.replace(/\D/g, '');  // Remove non-digits
        e.target.value = value.slice(0, 3); // Limit to 3 digits
    });

    // Validate form on submission
    paymentForm.addEventListener('submit', function (e) {
        // Basic validation
        if (!validateCardNumber(cardNumberInput.value)) {
            alert('Please enter a valid card number.');
            e.preventDefault();  // Stop form submission
        } else if (!validateExpiryDate(expiryDateInput.value)) {
            alert('Please enter a valid expiry date.');
            e.preventDefault();
        } else if (!validateCVV(cvvInput.value)) {
            alert('Please enter a valid CVV.');
            e.preventDefault();
        } else {
            // Form is valid, continue to submit
            alert('Payment details are valid. Processing payment...');
        }
    });

    function validateCardNumber(number) {
        // Basic Luhn Algorithm for card validation
        const cleanNumber = number.replace(/\s+/g, '');
        let sum = 0;
        let shouldDouble = false;
        for (let i = cleanNumber.length - 1; i >= 0; i--) {
            let digit = parseInt(cleanNumber.charAt(i));
            if (shouldDouble) {
                digit *= 2;
                if (digit > 9) digit -= 9;
            }
            sum += digit;
            shouldDouble = !shouldDouble;
        }
        return sum % 10 === 0;
    }

    function validateExpiryDate(date) {
        const [month, year] = date.split('/');
        if (!month || !year || month.length !== 2 || year.length !== 2) return false;
        const expiryDate = new Date(`20${year}`, month - 1);
        const currentDate = new Date();
        return expiryDate > currentDate;
    }

    function validateCVV(cvv) {
        return /^\d{3}$/.test(cvv);
    }
});
