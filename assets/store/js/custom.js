$(document).ready(function (){
	function Province() {
		$.getJSON("<?= base_url('shipping/province') ?>", function(data){
			$.each(data, function(i, opt) {
				$('.destination_province').append('<option value="'+opt.province_id+'">'+opt.province+ '</option>')
			});
		});
	}

	Province();

	function city(idprov){
		$.getJSON("<?= base_url('shipping/city/') ?>"+idprov, function(data){
			$.each(data, function(i, opt) {
				$('.destination_city').append('<option value="'+opt.city_id+'">'+opt.type+' '+opt.city_name+'</option>')
			});
			
		});
	}

	$(".destination_province").on("change", function(e){
	  e.preventDefault();
	  var option = $('option:selected', this).val();
	  $('.destination_city option:gt(0)').remove();
	  $('.kurir').val('');

	  if(option==='')
	  {
	    alert('null');    
	    $(".destination_city").prop("disabled", true);
	    $(".kurir").prop("disabled", true);
	  }
	  else
	  {        
	    $(".destination_city").prop("disabled", false);
	    city(option);
	  }
	});


	

	$(".destination_city").on("change", function(e){
	  e.preventDefault();
	  var option = $('option:selected', this).val();
	  $('.kurir').val('');

	  if(option==='')
	  {
	    alert('null');    
	    $(".kurir").prop("disabled", true);
	  }
	  else
	  {        
	    $(".kurir").prop("disabled", false);    
	  }
	});

	
	$(".kurir").on("change", function(e){
	  e.preventDefault();
	  let cour = $('option:selected', this).val();
	  let origin = "492"; // id kota tulungagung
	  let des = $(".destination_city").val();
	  let qty = $(".berat").val();
	  
	  if(qty==='0' || qty==='')
	  {
	    alert('jumlah barang belum di isi');
	  }
	  else if(cour==='')
	  {
	    alert('pilih jasa pengiriman');        
	  }
	  else
	  {            
	    cost(origin,des,qty,cour);
	  }
	});

	function cost(origin,des,qty,cour) {
	  
	  var i, j, x = "";
	  
	  $.getJSON("<?= base_url('shipping/cost/') ?>"+origin+"/"+des+"/"+qty+"/"+cour, function(data){     
	  	// console.log(data[0].costs[0].cost[0].value)
	    $.each(data, function(i,field){  
	    	

	      for(i in field.costs)
	      {
	          x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : "+field.costs[i].description+"</p>";

	           for (j in field.costs[i].cost) {
	                x += field.costs[i].cost[j].value +"<br>"+field.costs[i].cost[j].etd+"<br>"+field.costs[i].cost[j].note;
	            }
	         
	      }

	      $(".hasil").html(x);

	    });
	  });
	}
	 
	
	









});
