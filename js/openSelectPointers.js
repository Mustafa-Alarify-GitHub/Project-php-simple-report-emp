document.addEventListener("DOMContentLoaded", function () {
  const pointerCheckboxes = document.getElementsByClassName("pointer-checkbox");
  const evaluations1 = document.getElementsByClassName("evaluation_1");
  const evaluations = document.getElementsByClassName("evaluation");
  const results = document.getElementsByClassName("result");
  const totalResult = document.getElementById("total-result");

  function calculateTotal() {
      let total = 0;
      for (let i = 0; i < results.length; i++) {
          if (pointerCheckboxes[i].checked) {
              total += parseFloat(results[i].textContent);  
          }
      }
      totalResult.textContent = total.toFixed(2);  
  }

  for (let index = 0; index < pointerCheckboxes.length; index++) {
      pointerCheckboxes[index].addEventListener("change", function () {
          if (pointerCheckboxes[index].checked) {
              evaluations1[index].disabled = false; 
              evaluations[index].disabled = false;  
          } else {
              evaluations1[index].disabled = true;  
              evaluations[index].disabled = true;
              results[index].textContent = "0";    
          }

          calculateResult(index);
          calculateTotal();  
      });

      evaluations1[index].addEventListener("change", function () {
          calculateResult(index);
          calculateTotal(); 
      });

      evaluations[index].addEventListener("change", function () {
          calculateResult(index);
          calculateTotal(); 
      });
  }

  function calculateResult(index) {
      const importance = parseFloat(evaluations1[index].value);
      const rating = parseFloat(evaluations[index].value);

      const result = importance * rating;

      results[index].textContent = result.toFixed(2);
  }
});
