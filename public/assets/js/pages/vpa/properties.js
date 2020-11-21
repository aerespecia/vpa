"use strict";
var KTDatatablesDataSourceAjaxServer = function() {


	var initTable1 = function() {
		var table = $('#propertyTable');


		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 300,
            processing: true,

			ajax: {
				url: 'property/all',
				type: 'GET',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'Address', 'Bd', 'Bth', 'SqFt', 'LotSz',
						'Year','Orig Price','List Price'],
                },
			},
			columns: [
				{
                    class: 'font-size-lg',
                    data: null,
                    render: function(data, type, ful, meta) {
                        return '<span class="font-size-lg>'+ data.property_address+'</span>';
                    }
                },
				{data: 'price'},
				{data: 'sqft'},
                {data: 'arv'},
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {'title': 'Off Market', 'class': 'label-light-primary'},
                            2: {'title': 'On Market', 'class': ' label-light-info'},
                        };
                        if (typeof status[data.listing_type] === 'undefined' || typeof status[data.listing_type] === null) {
                            return data.listing_type;
                        }
                        return '<span class="label label-lg font-weight-bold' + status[data.listing_type].class +' label-inline">' +
                                status[data.listing_type].title + '</span>';
                    },
                }
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(function(){

    $("#homeNav").addClass('menu-item-active');
    $("#soldsActiveNav").removeClass('menu-item-active');
    $("#propertyListNav").removeClass('menu-item-active');
    $("#formsNav").removeClass('menu-item-active');

    KTDatatablesDataSourceAjaxServer.init();

    $("#saveProperty").click(function(e){
        var propertyInput = {
            propertyAddress: $("#propertyAddress").val(),
            price: $("#price").val(),
            sqftAddition: $("#sqftAddition").val(),
            sqft: $("#sqft").val(),
            arv: $("#arv").val(),
            lotSize: $("#lotSize").val(),
            zestimate: $("#zestimate").val(),
            listingType: $("input[name=listingType]:checked").val(),
            sources: $("input[name=sources]:checked").val(),
            linkToSource: $("#linkToSource").val(),
            levelOfConstruction: $("input[name=levelOfConstruction]:checked").val(),
            rehabCost: $("#rehabCost").val(),
            holdTime: $("#holdTime").val(),
            sellersName: $("#sellersName").val(),
            phone: $("#phone").val(),
            email: $("#email").val(),
            description: $("#description").val(),
            notes: $("#notes").val(),
        }

        $.ajax({
            type:"POST",
            url: "/property",
            data: propertyInput,
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
            success: function (result){

                toastr.options = {
                    "closeButton": false,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };

                  toastr.success("New Property Saved!");
                $('#propertyTable').DataTable().ajax.reload();
                // $("#labelNoStudies").html(forecastInput['noStudyPerday']);
                // $("#labelStudyGrowth").html(forecastInput['noStudyGrowthPercentage']);
                // $("#labelMonthsForecast").html(forecastInput['noOfMonthsToForecast']);

                // $("#noStudyPerday").val('');
                // $("#noStudyGrowthPercentage").val('');
                // $("#noOfMonthsToForecast").val('');

                // console.log(data);
                // for(var i=0; i < data.length; i++) {
                //     $('#resultsTable > tbody:last-child').append(
                //         '<tr><td>'+data[i]["monthYear"]+
                //         '</td><td>'+data[i]["studiesTotal"]+
                //         '</td><td>$'+data[i]["costForcasted"]+'</td></tr>'
                //     );
                // }

            }
        });
    });

    $("#fillDetails").on("click", function(e) {
        $.ajax({
            type:"GET",
            url: "/property/zestimate",
            data: {
                address: $("#propertyAddress").val()
            },
            success: function (result){
                console.log(result);
                $("#zestimate").html(result.zestimate);
                $("#rentalZestimate").html(result.rentalZestimate);

                L.map('kt_leaflet_1').remove();
                // define leaflet
                var leaflet = L.map('kt_leaflet_1', {
                    center: [result.lat, result.long],
                    zoom: 18
                });

                // set leaflet tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(leaflet);

                // set custom SVG icon marker
                var leafletIcon = L.divIcon({
                    html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
                    bgPos: [10, 10],
                    iconAnchor: [20, 37],
                    popupAnchor: [0, -37],
                    className: 'leaflet-marker'
                });

                // bind marker with popup
                L.marker([result.lat, result.long], { icon: leafletIcon }).addTo(leaflet);
            //   marker.bindPopup("<b>Flinder's Station</b><br/>Melbourne, Victoria").openPopup();
               // $("#kt_leaflet_1").ajax.reload();
            }
        });
    })
});
