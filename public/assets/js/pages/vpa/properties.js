"use strict";
var KTDatatablesDataSourceAjaxServer = function() {


	var initTable1 = function() {
		var table = $('#propertyCalculationsTable');


		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 300,
            processing: true,

			ajax: {
				url: 'property/calculations',
				type: 'GET',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
                        'Address', 'Purchase Price','ARV (Zestimare)','Construction Cost',
                        'Closing Cost', 'Total Estimated Selling Cost', 'Estimated Net Proceeds'
                    ],
                },
			},
			columns: [
				{
                    data: null,
                    render: function(data, type, ful, meta) {
                        return '<a type="button" data-toggle="modal" data-property-id="'+data.property_id+'" data-id="1" data-target="#propertyInfoModal">'+ data.address+'</a>';
                    }
                },
                {data: 'purchase_price'},
                {data: 'net_proceeds'},
				{data: 'zestimate'},
                {data: 'total_estimated_selling_cost'},

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


function calculatePropertyCostAndNet() {
    var zestimate = parseFloat($("#kt_slider_zestimate").val());

    var sqft = $("#sqft").val();
    var constructionCost = $("#kt_slider_construction_cost").val();

    var agentCommissionPct = parseFloat($("#info_agent_commission_percent").val().replace(/,/g, ''))/100;
    var sellingConcessionPct = parseFloat( $("#info_selling_concessions_percent").val().replace(/,/g, ''))/100;
    var closingFeesPct = parseFloat($("#info_closing_fees_percent").val().replace(/,/g, ''))/100;
    var taxesPct = parseFloat($("#info_taxes_percent").val().replace(/,/g, ''))/100;

    var agentCommission = agentCommissionPct * zestimate;
    var sellingConcession = sellingConcessionPct * zestimate;
    var closingFees = closingFeesPct * zestimate;
    var taxes = taxesPct * zestimate;

    var closingCost = agentCommission + sellingConcession + closingFees + taxes;
    var constructionCostTotal = constructionCost * sqft;

    var totalEstimatedSellingCost = constructionCostTotal + closingCost;

    var netProceeds = zestimate - (totalEstimatedSellingCost + parseFloat($("#purchase_price").val()));
    console.log(zestimate);
    console.log(totalEstimatedSellingCost);
    console.log($("#purchase_price").val());
    console.log(netProceeds);
    $("#info_net_proceeds").html(numeral(netProceeds).format('$0,0.00'));
    $("#info_construction_cost").html(numeral(constructionCostTotal).format('0,0.00'));

    $("#info_closing_cost").html(numeral(closingCost).format('$0,0.00'));
    $("#info_selling_cost").html(numeral(totalEstimatedSellingCost).format('$0,0.00'));

}

jQuery(function(){

    $("#homeNav").addClass('menu-item-active');
    $("#soldsActiveNav").removeClass('menu-item-active');
    $("#propertyListNav").removeClass('menu-item-active');
    $("#formsNav").removeClass('menu-item-active');


    KTDatatablesDataSourceAjaxServer.init();

    $('#propertyCalculationsTable tbody').on( 'click', 'a', function () {

        var id = $(this).attr("data-id");

        if(id==1){

              $.ajax({
                   type:"GET",
                   url: "/property/calculation/"+$(this).attr("data-property-id"),
                   success: function (data){
                    console.log(data);


                    // HTML
                    $("#info_zestimate").text(numeral(data.zestimate).format('$0,0.00'));
                    $("#info_purchase_price").text(numeral(data.purchase_price).format('$0,0.00'));
                    $("#purchase_price").val(data.purchase_price);
                    $("#zestimate").val(data.zestimate);
                    $("#sqft").val(data.sq_ft);
                    $("#info_bedrooms").html(data.bed_room);
                    $("#info_bathrooms").html(data.bath_room);
                    $("#info_sq_ft").html(numeral(data.sq_ft).format('0,0.00'));
                    $("#info_address").html(data.address);
                    $("#info_net_proceeds").html(numeral(data.net_proceeds).format('$0,0.00'));
                    $("#info_selling_price").html(numeral(data.zestimate).format('$0,0.00'));
                    $("#info_construction_cost").html(numeral(data.construction_cost).format('0,0.00'));
                    $("#chosen_construction_cost").val(data.chosen_construction_cost);

                    var constructionCostPerSqFt = 60;
                    switch(data.chosen_construction_cost) {
                        case 1:
                            $("#info_chosen_construction_type").html("Light");
                            constructionCostPerSqFt = data.construction_light;
                            break;
                        case 2:
                            $("#info_chosen_construction_type").html("Medium");
                            constructionCostPerSqFt = data.construction_medium;
                            break;
                        case 3:
                            $("#info_chosen_construction_type").html("Heavy");
                            constructionCostPerSqFt = data.construction_heavy;
                            break;
                        case 4:
                            $("#info_chosen_construction_type").html("Ground Up");
                            constructionCostPerSqFt = data.construction_groundup;
                            break;
                    }

                    $("#info_construciton_cost_punit").html(numeral(constructionCostPerSqFt).format('$0,0.00'));
                    $("#info_closing_cost").html(numeral(data.closing_cost).format('$0,0.00'));
                    $("#info_selling_cost").html(numeral(data.total_estimated_selling_cost).format('$0,0.00'));

                    // VAL
                    $("#info_agent_commission").val(data.agent_commision_amount);
                    $("#info_agent_commission_percent").val(data.agent_commision_pct*100);
                    $("#info_selling_concessions").val(data.selling_concession_amount);
                    $("#info_selling_concessions_percent").val(data.selling_concession_pct*100);
                    $("#info_closing_fees").val(data.closing_fees_amount);
                    $("#info_closing_fees_percent").val(data.closing_fees_pct*100);
                    $("#info_taxes").val(data.taxes_amount);
                    $("#info_taxes_percent").val(data.taxes_pct*100);

                    $('#kt_slider_zestimate').ionRangeSlider({
                        min:0,
                        max:data.zestimate*2,
                        from: data.zestimate
                    });

                    // min & max values
                    $('#kt_slider_construction_cost').ionRangeSlider({
                        min: 50,
                        max: 500,
                        from: constructionCostPerSqFt
                    });

                    new Cleave('#info_agent_commission', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });

                    new Cleave('#info_agent_commission_percent', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });

                    new Cleave('#info_selling_concessions', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });

                    new Cleave('#info_selling_concessions_percent', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });

                    new Cleave('#info_closing_fees', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });

                    new Cleave('#info_closing_fees_percent', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });

                    new Cleave('#info_taxes', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });

                    new Cleave('#info_taxes_percent', {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'

                    });

                   }
            });


        }

      });

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
                  $("#propertyAddress").val('');
                  $("#price").val('');
                  $("#sqft").val('');
                  $("zestimate").val(0);
                  $("#zestimateView").html('');
                  $("#rentZestimate").html('');
                $('#propertyCalculationsTable').DataTable().ajax.reload();
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

    $("#kt_slider_zestimate").on("change", function(e) {
        $("#info_selling_price").text(numeral($(this).val()).format('$0,0.00'));
        calculatePropertyCostAndNet();
    });

    $('#kt_slider_construction_cost').on("change", function(e) {
        var construction_cost = $(this).val();
        if(construction_cost < 140) {
            $("#info_chosen_construction_type").html("Light");
            $("#chosen_construction_cost").val(1);
        }
        if(construction_cost >= 140 && construction_cost < 200) {
            $("#info_chosen_construction_type").html("Medium");
            $("#chosen_construction_cost").val(2);
        }
        if(construction_cost >= 200 && construction_cost < 300) {
            $("#info_chosen_construction_type").html("Heavy");
            $("#chosen_construction_cost").val(3);
        }
        if(construction_cost >= 300) {
            $("#info_chosen_construction_type").html("Ground Up");
            $("#chosen_construction_cost").val(4);
        }

        $("#info_construciton_cost_punit").html(numeral(construction_cost).format('$0,0.00'));
        calculatePropertyCostAndNet();

    });

    $("#info_agent_commission").on(" keyup change", function(e) {
        var zestimate = parseFloat($("#kt_slider_zestimate").val());

        calculatePropertyCostAndNet();
    });
    $("#info_agent_commission_percent").on(" keyup change", function(e) {
        calculatePropertyCostAndNet();
    });
    $("#info_selling_concessions").on(" keyup change", function(e) {
        calculatePropertyCostAndNet();
    });
    $("#info_selling_concessions_percent").on(" keyup change", function(e) {
        calculatePropertyCostAndNet();
    });
    $("#info_closing_fees").on(" keyup change", function(e) {
        calculatePropertyCostAndNet();
    });
    $("#info_closing_fees_percent").on(" keyup change", function(e) {
        calculatePropertyCostAndNet();
    });
    $("#info_taxes").on(" keyup change", function(e) {
        calculatePropertyCostAndNet();
    });
    $("#info_taxes_percent").on(" keyup change", function(e) {
        calculatePropertyCostAndNet();
    });

    $("#propertyAddress").on("keyup change", function(e) {
        $.ajax({
            type:"GET",
            url: "/property/zestimate",
            data: {
                address: $("#propertyAddress").val()
            },
            success: function (result){
                console.log(result);
                $("#zestimateView").html(result.zestimate);
                $("#zestimate").val(result.zestimateRaw);
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
