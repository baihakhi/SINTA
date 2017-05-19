function cari() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[3];
  te = tr[i].getElementsByTagName("td")[2];
  tm = tr[i].getElementsByTagName("td")[1];
  if (td) {
    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
    } else if (te.innerHTML.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
    } else if (tm.innerHTML.toUpperCase().indexOf(filter) > -1) {
    tr[i].style.display = "";
    } else {
    tr[i].style.display = "none";
    }
  }
  }
}
