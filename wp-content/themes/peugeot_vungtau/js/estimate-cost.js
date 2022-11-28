jQuery(function ($) {

	$(document).ready(function () {
		const url = new URL(window.location.href);

		let total_cost = $('input[name="total_price"]').data('number');
		let total_loan_money = $('select#loan_money').find('option:selected').data('number');

		url.searchParams.set('loan', $('#loan').find('option:selected').val());
		url.searchParams.set('loan-percent', $('#loan_money').find('option:selected').val());

		$('select#area').change(function () {
			if ($(this).find('option:selected').val() != '') {
				url.searchParams.set('area', $(this).find('option:selected').val());
			} else {
				url.searchParams.delete('area');
			}
			window.history.pushState(null, null, url); // or pushState

			updateCalculator();
			updateLoanMoneySelect();
			updateLoanMoney();
			updateTable();
		});

		$('select#bank').change(function () {
			if ($(this).find('option:selected').val() != '') {
				url.searchParams.set('bank-code', $(this).find('option:selected').val());

				$('#loan_estimate_table').show();
			} else {
				url.searchParams.delete('bank-code');
				$('#loan_estimate_table').hide();
			}
			window.history.pushState(null, null, url); // or pushState

			updateLoanMoney();
			updateBankName();
			updateTable();
		});

		$('select#loan').change(function () {
			if ($(this).find('option:selected').val() != '') {
				url.searchParams.set('loan', $(this).find('option:selected').val());
			} else {
				url.searchParams.delete('loan');
			}
			window.history.pushState(null, null, url); // or pushState

			updateLoanMoney();
			updateLoanMonth();
			updateTable();
		});

		$('select#loan_money').change(function () {
			if ($(this).find('option:selected').val() != '') {
				url.searchParams.set('loan-percent', $(this).find('option:selected').val());
			} else {
				url.searchParams.delete('loan-percent');
			}
			window.history.pushState(null, null, url); // or pushState

			updateLoanMoney();
			updateTable();
		});


		function init() {
			window.history.pushState(null, null, url); // or pushState

			updateLoanMoney();
			updateLoanMonth();
			updateBankName();

			if ($('select#bank').find('option:selected').val() == '') {
				$('#loan_estimate_table').hide();
			}

			updateTable();
		}

		init();

		function updateCalculator() {

			let lpr_fee = $('#area').find('option:selected').data('lprfee');
			let cost_car = $('#cost_car').val();
			let registration_fee = $('#registration_fee').val();
			let discount = $('#discount').val();

			total_cost = parseInt(cost_car) + parseInt(lpr_fee) + parseInt(registration_fee) - parseInt(discount);

			$('#label_lpr_fee').text(formatNumber(lpr_fee));

			$('.total-cost-label:not(input)').text(formatNumber(total_cost) + ' VNĐ');
			$('input[name="total_price"]').val(formatNumber(total_cost) + ' VNĐ');
			$('input[name="total_price"]').data('number', total_cost);

		}

		function updateLoanMoneySelect() {
			$('select#loan_money').find('option:not([disabled])').each(function () {
				console.log($(this).val());
				let percent = $(this).val();

				$(this).data('number', total_cost * (percent / 100));
				$(this).text(percent + '% - ' + formatNumber(total_cost * (percent / 100)) + ' VNĐ');
			})
		}

		function updateLoanMoney() {
			let loan_money = $('select#loan_money').find('option:selected').data('number');
			let interest_bank = $('select#bank').find('option:selected').data('interest_rate');
			let months = $('select#loan').find('option:selected').data('months');
			total_loan_money = Math.ceil(loan_money + (loan_money * (interest_bank / 100)));

			let price_per_month = Math.ceil(total_loan_money / parseInt(months));

			$('#total_loan_money').text(formatNumber(total_loan_money));
			$('#price_per_month').text(formatNumber(price_per_month));


			$('input[name="total_loan_money"]').val(total_loan_money);
			$('input[name="price_per_month"]').val(price_per_month);

		}

		function updateLoanMonth() {
			let month = $('select#loan').find('option:selected').data('months');
			let year = $('select#loan').find('option:selected').val();

			$('span#months').text(month);
			$('span#year').text(year);

		}

		$('#loan_detail_table').find('.show-table').click(function () {
			$('#loan-table').toggle();
			$(this).toggleClass('active');
		});

		// $('#pdf_download').click(function () {
		// 	html2canvas($('#loan-table')[0], {
		// 		onrendered: function (canvas) {
		// 			console.log(canvas);
		// 			var data = canvas.toDataURL();
		// 			console.log(data);
		// 			var docDefinition = {
		// 				content: [{
		// 					image: data,
		// 					width: 500
		// 				}]
		// 			};
		// 			pdfMake.createPdf(docDefinition).download("customer-details.pdf");
		// 		}
		// 	});
		// });

		$('#pdf_download').click(function () {
			$("#loan-table").tableHTMLExport({type:'pdf',filename:'sample.pdf'});
		});


		function updateTable() {
			if ($('#loan').find('option:selected').val() == '' || $('#bank').find('option:selected').val() == ''|| $('#loan_money').find('option:selected').val() == '') {
				console.log($('#loan').find('option:selected').val());
				console.log($('#bank').find('option:selected').val());
				console.log($('#loan_money').find('option:selected').val());
				return;
			}

			const body_table = $('#loan-table').find('tbody');

			if (body_table.find('tr').length > 0) {
				body_table.empty();
			}
			let month = $('select#loan').find('option:selected').data('months');
			let loan_money = $('select#loan_money').find('option:selected').data('number');
			let interest_bank = $('select#bank').find('option:selected').data('interest_rate');
			let months = $('select#loan').find('option:selected').data('months');
			total_loan_money = Math.ceil(loan_money + (loan_money * (interest_bank / 100)));
			let money_origin_month = Math.ceil(loan_money / parseInt(months));

			let price_per_month = Math.ceil(total_loan_money / parseInt(months));

			let interest_month = interest_bank / months;
			let remain = total_loan_money;
			for (let  i = 1; i <= month; i++) {

				let data = {
					month: i,
					total : formatNumber(price_per_month),
					money_origin : formatNumber(money_origin_month),
					interest : formatNumber(price_per_month-money_origin_month),
					remain : formatNumber(remain = remain - price_per_month),
					percent : interest_month.toFixed(2),
				};
				body_table.append(generateTable(data));
			}

		}

		function generateTable(row) {

			return `
      <tr>
        <td>${row.month}</td>
        <td>${row.total}</td>
        <td>${row.money_origin}</td>
        <td>${row.interest}</td>
        <td>${row.remain}</td>
        <td>${row.percent}</td>
       </tr>
     `
		}

		function updateBankName() {
			$('span#bank_name').text($('select#bank').find('option:selected').data('bank_name'));
		}

		function formatNumber(num) {
			return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
		}

		$('#nav_header_tab_1').click(function () {
			$(this).toggleClass('active');
			$('#nav_header_tab_2').removeClass('active');
			$('#btn_header_tab_1').toggleClass('active');
			$('#btn_header_tab_2').removeClass('active');
			$('#area').removeAttr('disabled');
			$('.select-cars').show();
			$('#credit_form').show();
			$('#contact_form').hide()
		});
		$('#btn_header_tab_1').click(function () {
			$(this).toggleClass('active');
			$('#nav_header_tab_2').removeClass('active');
			$('#nav_header_tab_1').toggleClass('active');
			$('#btn_header_tab_2').removeClass('active');
			$('#area').removeAttr('disabled');
			$('.select-cars').show();
			$('#credit_form').show();
			$('#contact_form').hide()
		});
		$('#nav_header_tab_2').click(function () {
			$(this).toggleClass('active');
			$('#nav_header_tab_1').removeClass('active');
			$('#btn_header_tab_1').removeClass('active');
			$('#btn_header_tab_2').toggleClass('active');
			$('.select-cars').hide();
			$('#credit_form').hide();
			$('#contact_form').show()
			$('#area').attr('disabled', 'disabled');
		});

		$('#btn_header_tab_2').click(function () {
			$(this).toggleClass('active');
			$('#nav_header_tab_1').removeClass('active');
			$('#btn_header_tab_1').removeClass('active');
			$('#nav_header_tab_2').toggleClass('active');
			$('.select-cars').hide();
			$('#credit_form').hide();
			$('#contact_form').show();
			$('#area').attr('disabled', 'disabled');
		});

	})
})
