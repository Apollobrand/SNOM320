$(document).ready(function () {
   $(":checkbox").change(function () {
       $.post("../../application/class/view/admin/overviewProject.php", { id: this.id, checked: this.checked});
   });
});