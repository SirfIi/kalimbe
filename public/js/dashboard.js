
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
          fill: false,
          borderColor: [
            'rgba(36, 109, 248, 1 )'
          ],
          borderWidth: 1
        },
        {
          label: '# Emplois',
          data: nbJobs,
          fill: false,
          lineTension: 0.05,
          borderColor: [
            ' #DC143C'
          ],
          borderWidth: 1
        }]
      },
      options: {
        title: {
          display: false
        },
        gridLines: {
          display: false
        },
        legend: {
          display: true
        },
        tooltips: {
          mode: 'dataset',
          intersect: true
        },
        responsive: true,
        scales: {
          xAxes: [ {
            ticks: {
                beginAtZero: false
            }
        }],
          yAxes: [
          {
            ticks: {
                beginAtZero: false
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

