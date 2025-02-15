const inpRadio = document.getElementsByClassName("inpRadio");
const employee = document.getElementById("employee");

inpRadio[0].onchange = () => {
  if (inpRadio[0].checked) {
    employee.disabled = true;
  } else {
    employee.disabled = false;
  }
};
inpRadio[1].onchange = () => {
  if (inpRadio[0].checked) {
    employee.disabled = true;
  } else {
    employee.disabled = false;
  }
};
inpRadio[2].onchange = () => {
  if (inpRadio[0].checked) {
    employee.disabled = true;
  } else {
    employee.disabled = false;
  }
};
