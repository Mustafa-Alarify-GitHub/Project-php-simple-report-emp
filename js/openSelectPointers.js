    document.querySelectorAll('.pointer-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            let row = this.closest('tr');
            let selects = row.querySelectorAll('select');
            let resultCell = row.querySelector('.result');

            selects.forEach(select => {
                select.disabled = !this.checked;
            });

            if (!this.checked) {
                resultCell.innerText = '0';
            }
            updateTotal();
        });
    });

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.result').forEach(resultCell => {
            total += parseFloat(resultCell.innerText);
        });
        document.getElementById('total-result').innerText = total.toFixed(2);
    }
    document.querySelectorAll('.pointer-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            let row = this.closest('tr');
            let selects = row.querySelectorAll('select');
            let resultCell = row.querySelector('.result');

            selects.forEach(select => {
                select.disabled = !this.checked;
            });

            if (!this.checked) {
                resultCell.innerText = '0';
            }

            updateTotal();
        });
    });

