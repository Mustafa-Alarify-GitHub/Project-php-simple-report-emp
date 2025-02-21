const evaluations = document.getElementsByClassName("evaluation_1");
const pointerCheckboxes = document.getElementsByClassName("pointer-checkbox");

for (let index = 0; index < evaluations.length; index++) {
  evaluations[index].addEventListener("change", function () {
    let total = 0;

    for (let i = 0; i < evaluations.length; i++) {
      if (pointerCheckboxes[i].checked) {
        total += parseFloat(evaluations[i].value);
      }
    }

    if (total > 1) {
      alert("القيمة الإجمالية تتجاوز 1.");
      evaluations[index].value = 0;
    }

    console.log("مجموع القيم: ", total);
  });
}
