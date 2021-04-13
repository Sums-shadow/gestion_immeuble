jQuery(document).ready(function () {
  jQuery("#data").DataTable();

  $(".addTourist").click(function (e) {
    e.preventDefault();
    console.log("clickeddddd");
    var data = document.querySelectorAll(".tourdata");
    data.forEach((e) => {
      if (e.checked) {
        console.log(e.id);
      }
    });
  });

  function saveTour(idtour) {
    $.ajax({
      type: "POST",
      url: "../admin/add-touriste.php",
      data: {
        addtouriste: 1,
        idtour: idtour,
		nom:nom,
		postnom:postnom,
		prenom:prenom,
		sexe:sexe,
		ecole:ecole,
		classe:classe,
		lieunaissance:lieunaissance,
		datenaissance:datenaissance,
		adresse:adresse,
		mail:mail,
		contact:contact
      },
      dataType: "dataType",
      success: function (response) {},
    });
  }
});
