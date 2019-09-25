function roi_calculate (invoicesPerMonth, paymentsPerMonth, apStaffEmployed) {
  var invoiceProcessing = {
      invoicesPerMonth: invoicesPerMonth,
      industry: invoicesPerMonth * 9,
      avid: invoicesPerMonth * 1.5
  };
  var paperCheck = {
     paymentsPerMonth: paymentsPerMonth,
     industry: paymentsPerMonth * 7.15,
     avid: paymentsPerMonth * 0.68
  };

  var getSavings = function (category) {
    var monthly = category.industry - category.avid;
    var percentage = (monthly / category.industry) * 100;
    var difference = 100 - percentage;
    var savings = {
      monthly: monthly,
      percentage: percentage,
      difference: difference
    };
    return savings;
  };

  invoiceProcessing.savings = getSavings(invoiceProcessing);
  paperCheck.savings = getSavings(paperCheck);

  var savings = {
    invoiceProcessing: invoiceProcessing,
    paperCheck: paperCheck,
    apStaffEmployed: apStaffEmployed,
    total: invoiceProcessing.savings.monthly + paperCheck.savings.monthly,
    hours: (apStaffEmployed * 4) * 20
  };
  return savings;
};

function roi_display (results, pageOnly) {
    $ = jQuery;
    var f = function(number) {
        return '$' + number.toFixed(2);
    };

    //User Inputs
    $('.results .user-inputs .user-invoices').html(
        results.invoiceProcessing.invoicesPerMonth
    );
    
    $('.results .user-inputs .user-payments').html(
        results.paperCheck.paymentsPerMonth
    );
    
    $('.results .user-inputs .user-staff').html(
        results.apStaffEmployed
    );

    //Totals
    $('.results .savings.dollars .amount').html(
        f(results.total)
    );
    
    $('.results .savings.manHours .amount').html(
        results.hours
    );
    
    // Invoice Processing
    $('.results .invoice .industry .cost').html(
        f(results.invoiceProcessing.industry)
    );
    $('.results .invoice .avid .cost').html(
        f(results.invoiceProcessing.avid)
    );
    $('.results .invoice .monthlySavings .amount').html(
        f(results.invoiceProcessing.savings.monthly)
    );

    $('.results .invoice .monthlySavings .percentage').html(
        Math.floor(results.invoiceProcessing.savings.percentage) + '%'
    );

    $('.results .invoice .monthlySavings .avidGraph').css('height',
        results.invoiceProcessing.savings.difference
    );
    
    // Paper Check
    $('.results .paperCheck .industry .cost').html(
        f(results.paperCheck.industry)
    );
    $('.results .paperCheck .avid .cost').html(
        f(results.paperCheck.avid)
    );
    $('.results .paperCheck .monthlySavings .amount').html(
        f(results.paperCheck.savings.monthly)
    );

    $('.results .paperCheck .monthlySavings .percentage').html(
        Math.floor(results.paperCheck.savings.percentage) + '%'
    );

    $('.results .paperCheck .monthlySavings .avidGraph').css('height',
        results.paperCheck.savings.difference
    );

    if(!pageOnly) {
        $('.roi-calculator-form-modal .modal-dialog').removeClass('modal-sm');
        $('.roi-calculator-form-modal .modal-dialog').addClass('modal-lg');
        $('.roi-calculator-form_wrapper').hide();
        $('.roi-calculator-form-modal .results').fadeIn();
    } else {
        $('.results').fadeIn();
    }

    $('.roi-calculator-form-modal h2:first-of-type').css('text-align', 'center');
    $('.results .savings circle').css('stroke-dashoffset', 0);
}

var calcResults = {};

jQuery(document).bind('gform_post_render', function(){
    $ = jQuery;

    if($('.roi-calculator-form div.validation_error').length > 0 || $('.user-invoices input').length < 1) {
        return;
    }
    
    var getToken = function() {
        var token = '' + new Date().getTime() + '-' + Math.random();
        return token.split('.').join('');
    }

    if($('.roi-calculator-form .gfield input[type="hidden"]').val() === 'none') {
        var token = getToken();
        $('.roi-calculator-form .gfield input[type="hidden"]').val(token);
        calcResults.token = token;
    }

    calcResults.invoicesPerMonth = parseInt($('.user-invoices input').val()) || 0;
    calcResults.paymentsPerMonth = parseInt($('.user-payments input').val()) || 0;
    calcResults.apStaffEmployed = parseInt($('.user-staff input').val()) || 0;
});

jQuery(document).bind('gform_confirmation_loaded', function (e, form_id, form_) {
    $ = jQuery;

    var invoicesPerMonth = calcResults.invoicesPerMonth; //parseInt($('.user-invoices input').val()) || 0;
    var paymentsPerMonth = calcResults.paymentsPerMonth; //parseInt($('.user-payments input').val()) || 0;
    var apStaffEmployed = calcResults.apStaffEmployed; //parseInt($('.user-staff input').val()) || 0;
    var token = calcResults.token;

    if(invoicesPerMonth + paymentsPerMonth + apStaffEmployed <= 0) {
        return;
    }
    /*
    var results = roi_calculate(invoicesPerMonth, paymentsPerMonth, apStaffEmployed);
    roi_display(results);
    */
    
    $('.roi-calculator-form-modal .modal-body').html('<p style="color: #fff;">Calculating...</p>');
    window.location.href = '/roi-calculator/results/?invoices=' + invoicesPerMonth + '&checks=' + paymentsPerMonth + '&staff=' + apStaffEmployed + '&token=' + token;
});

jQuery('.print-results').click(function() {
    window.print();
    /*
    $ = jQuery;
    var page = $('body').html();
    var content = $('#modal_print_content').clone();
    content.find('.graph').remove();
    content.find('.print-results').remove();
    var print_window = window.open('', 'Print', 'height=400,width=600');
    var logo = '<div class="print-logo-img-container"><img src="/wp-content/uploads/avidxchange-logo.svg" width="192" height="31" style="height:31px; overflow:hidden;"></div>';
    print_window.document.write('<html><head><title>AvidXchange | Return on Investment</title><link rel="stylesheet" type="text/css" href="/wp-content/themes/bootstrap-genesis-develop/styles/css/style.css" media="screen, print"></head><body>' + logo);
    print_window.document.write(content.html());
    print_window.document.write('</body></html>');
    setTimeout(function() {
        print_window.document.close();
        print_window.focus();
        print_window.print();
        print_window.close();
    }, 500);
    return true;
    */
});
