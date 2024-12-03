document.addEventListener('DOMContentLoaded', function () {
    const statusRadios = document.querySelectorAll('input[name="fc_status"]');
    const errorTextDiv = document.getElementById('error-text');

    statusRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'E') {
                errorTextDiv.style.display = 'block';
                errorTextDiv.classList.add('fade-in');
            } else {
                errorTextDiv.style.display = 'none';
            }
        });
    });

    // Show the error text if the page loads with 'E' selected
    const selectedRadio = document.querySelector('input[name="fc_status"]:checked');
    if (selectedRadio && selectedRadio.value === 'E') {
        errorTextDiv.style.display = 'block';
    }
});
