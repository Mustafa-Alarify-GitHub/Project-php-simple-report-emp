document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('.pointer-checkbox');
    const totalResult = document.getElementById('total-result');
    let alertDisplayed = false; 
    document.querySelectorAll('.evaluation_1, .evaluation').forEach(select => {
        select.disabled = true;
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            let row = this.closest('tr');
            let importanceSelect = row.querySelector('.evaluation_1'); 
            let ratingSelect = row.querySelector('.evaluation'); 
            let resultCell = row.querySelector('.result');

            if (this.checked) {
                importanceSelect.disabled = false;  
                ratingSelect.disabled = false;     
            } else {
                importanceSelect.disabled = true;  
                ratingSelect.disabled = true;     
                resultCell.innerText = '0';        
            }

            updateTotal();  
        });
    });

    document.querySelectorAll('.evaluation_1, .evaluation').forEach(select => {
        select.addEventListener('change', function () {
            let row = this.closest('tr');
            let importanceSelect = row.querySelector('.evaluation_1'); 
            let ratingSelect = row.querySelector('.evaluation'); 
            let resultCell = row.querySelector('.result');

            const importance = parseFloat(importanceSelect.value);
            const rating = parseFloat(ratingSelect.value);

            const result = importance * rating;

            resultCell.innerText = result.toFixed(2);  
            updateTotal();  
        });
    });

    function updateTotal() {
        let total = 0;

        document.querySelectorAll('.result').forEach(resultCell => {
            let resultValue = parseFloat(resultCell.innerText); 
            if (!isNaN(resultValue)) {
                total += resultValue; 
            }
        });

        console.log('total :>> ', total);
        totalResult.innerText = total; 

        if (total > 1 && !alertDisplayed) { 
            alert("المجموع الكلي تجاوز 1!"); 
            alertDisplayed = true;
        } else if (total <= 1 && alertDisplayed) {
            alertDisplayed = false; 
        }
    }
});
