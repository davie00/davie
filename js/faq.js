var acc = document.getElementsByClassName("accordion");
console.log(acc);
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Wechsel zwischen dem Hinzufügen und Entfernen der "active" class,
    um die Schaltfläche zu markieren, die das Panel steuert */
    this.classList.toggle("active");

    /* Umschalten zwischen Ausblenden und Einblenden des aktiven panels  */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}