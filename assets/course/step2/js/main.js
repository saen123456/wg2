(function ($) {
    // var form = $("#signup-form");
    // form.validate({
    //     errorPlacement: function errorPlacement(error, element) {
    //         element.before(error);
    //     },
    //     rules: {
    //         email: {
    //             email: true,
    //             required: true,
    //         }
    //     },
    //     onfocusout: function (element) {
    //         $(element).valid();
    //     },
    // });
    $("#signup-form").steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        stepsOrientation: "vertical",
        titleTemplate: '<div class="title"><span class="step-number">#index#</span><span class="step-text">#title#</span></div>',
        enableAllSteps: true,
        labels: {
            // previous: 'Previous',
            // next: 'Next',
            // finish: 'Finish',
            current: ''
        },
        // onStepChanging: function (event, currentIndex, newIndex) {

        //     form.validate().settings.ignore = ":disabled,:hidden";
        //     return form.valid();
        // },
        // onFinishing: function (event, currentIndex) {
        //     form.validate().settings.ignore = ":disabled";
        //     return form.valid();
        // },
        // onFinished: function (event, currentIndex) {
        //     alert('Submited');
        // },
        // onStepChanged: function (event, currentIndex, priorIndex) {
        //     console.log("currentIndex = " + priorIndex)
        //     if (priorIndex == 0) {

        //     }

        //     return true;
        // }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });

    $.dobPicker({
        daySelector: '#birth_date',
        monthSelector: '#birth_month',
        yearSelector: '#birth_year',
        dayDefault: '',
        monthDefault: '',
        yearDefault: '',
        minimumAge: 0,
        maximumAge: 120
    });
    var marginSlider = document.getElementById('slider-margin');
    if (marginSlider != undefined) {
        noUiSlider.create(marginSlider, {
            start: [1100],
            step: 100,
            connect: [true, false],
            tooltips: [true],
            range: {
                'min': 100,
                'max': 2000
            },
            pips: {
                mode: 'values',
                values: [100, 2000],
                density: 4
            },
            format: wNumb({
                decimals: 0,
                thousand: '',
                prefix: '$ ',
            })
        });
        var marginMin = document.getElementById('value-lower'),
            marginMax = document.getElementById('value-upper');

        marginSlider.noUiSlider.on('update', function (values, handle) {
            if (handle) {
                marginMax.innerHTML = values[handle];
            } else {
                marginMin.innerHTML = values[handle];
            }
        });
    }
})(jQuery);