document.addEventListener("DOMContentLoaded", function () {
  const pointerCheckboxes = document.getElementsByClassName("pointer-checkbox");
  const evaluations1 = document.getElementsByClassName("evaluation_1");
  const evaluations = document.getElementsByClassName("evaluation");
  const results = document.getElementsByClassName("result");

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
    });

    evaluations1[index].addEventListener("change", function () {
      calculateResult(index);
    });

    evaluations[index].addEventListener("change", function () {
      calculateResult(index);
    });
  }

  function calculateResult(index) {
    const importance = parseFloat(evaluations1[index].value);
    const rating = parseFloat(evaluations[index].value);

    const result = importance * rating;

    results[index].textContent = result.toFixed(2);
  }
});
