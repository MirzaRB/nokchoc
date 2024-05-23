jQuery(document).ready(function($) {
    var currentStep = 1;
    console.log('currentStep'+ currentStep);
    showStep(currentStep);

    $('.next-step').click(function() {
        currentStep++;
        showStep(currentStep);
    });

    $('.prev-step').click(function() {
        currentStep--;
        showStep(currentStep);
    });

    function showStep(step) {
        $('.step').hide();
        $('#step-' + step).css('display', 'flex');
    }
});