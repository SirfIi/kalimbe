
  $(document).ready(function() {

  if ($("#view-chart").length > 0) {
    var ctx = document.getElementById("view-chart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: mois,
        datasets: [{
          label: '# Applications',
          data: nbApp,
          backgroundColor: 'rgba(36, 109, 248, 0.5 )',
          borderColor: "rgba(36, 109, 248, 0.7)",
          borderWidth: 2
        },
        {
          label: '# Emplois',
          data: nbJobs,
          backgroundColor: 'rgba(36, 109, 248, 0.5 )',
          borderColor: "rgba(36, 109, 248, 0.7)",
          borderWidth: 2
        }]
      },
      options: {
        scales: {
            yAxes: [{

            }]
        },
            legend: {
        display: true,
        position: 'bottom',

        labels: {
            fontColor: '#71748d',
            fontFamily: 'Circular Std Book',
            fontSize: 14,
        }
    },

    scales: {
        xAxes: [{
            ticks: {
                fontSize: 14,
                fontFamily: 'Circular Std Book',
                fontColor: '#71748d',
            }
        }],
        yAxes: [{
            ticks: {
                fontSize: 14,
                fontFamily: 'Circular Std Book',
                fontColor: '#71748d',
            }
        }]
    }
}
    });
  }


  

	/*---------------------------------------------
		Dashboard
	---------------------------------------------*/

	$('.upload-profile-photo .file-input').change(function(){
	    var curElement = $(this).parent().parent().find('.image');
	    var reader = new FileReader();

	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        curElement.attr('src', e.target.result);
	    };

	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	});

	$('.send-file .file-input').change(function(){
	    var curElement = $(this).parent().parent().find('.image');
	    var reader = new FileReader();

	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        curElement.attr('src', e.target.result);
	    };

	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	});


  /*-------------------------------------
    tooltip
  -------------------------------------*/

  $('.user-number i').tooltip();

})

