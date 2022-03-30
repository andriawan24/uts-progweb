$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        margin: 20,
        dots: true,
        responsive: {
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
                loop:false
            }
        }
    });

    $('#card-promos').click(() => {
        window.location.href = "/detail.html"
    })

    let input = $('#amount-input')
    console.log(input)

    $('#select-amount-1').click(() => {
        input.val('')
        let pTag = $("#select-amount-1 p:first")
        let p2Tag = $("#select-amount-2 p:first")
        let p3Tag = $("#select-amount-3 p:first")
        if (pTag.hasClass('selected')) {
            pTag.removeClass('selected')
            input.prop('disabled', false)
        } else {
            pTag.addClass('selected')
            p2Tag.removeClass('selected')
            p3Tag.removeClass('selected')
            input.prop('disabled', true)
        }
    })

    $('#select-amount-2').click(() => {
        input.val('')
        let pTag = $("#select-amount-2 p:first")
        let p2Tag = $("#select-amount-1 p:first")
        let p3Tag = $("#select-amount-3 p:first")
        if (pTag.hasClass('selected')) {
            pTag.removeClass('selected')
            input.prop('disabled', false)
        } else {
            pTag.addClass('selected')
            p2Tag.removeClass('selected')
            p3Tag.removeClass('selected')
            input.prop('disabled', true)
        }
    })

    $('#select-amount-3').click(() => {
        input.val('')
        let pTag = $("#select-amount-3 p:first")
        let p2Tag = $("#select-amount-2 p:first")
        let p3Tag = $("#select-amount-1 p:first")
        if (pTag.hasClass('selected')) {
            pTag.removeClass('selected')
            input.prop('disabled', false)
        } else {
            pTag.addClass('selected')
            p2Tag.removeClass('selected')
            p3Tag.removeClass('selected')
            input.prop('disabled', true)
        }
    })


    $('#goals').click(() => {
        if ($('#list-goals').hasClass('d-none')) {
            $('#list-goals').removeClass('d-none')
        }

        if (!$('#list-business').hasClass('d-none')) {
            $('#list-business').addClass('d-none')
        }

        if (!$('#goals-text').hasClass('detail-choose')) {
            $('#goals-text').addClass('detail-choose')
        }

        if ($('#business-text').hasClass('detail-choose')) {
            $('#business-text').removeClass('detail-choose')
        }
    })

    $('#business-proposal').click(() => {
        if ($('#list-business').hasClass('d-none')) {
            $('#list-business').removeClass('d-none')
        }

        if (!$('#list-goals').hasClass('d-none')) {
            $('#list-goals').addClass('d-none')
        }

        if (!$('#business-text').hasClass('detail-choose')) {
            $('#business-text').addClass('detail-choose')
        }

        if ($('#goals-text').hasClass('detail-choose')) {
            $('#goals-text').removeClass('detail-choose')
        }
    })

   $('#list-business').click((e) => {
        var doc = new jsPDF()

        doc.text($('#title').text(), 50, 10)
        doc.text($('#short-description').text(), -30, 30)
        doc.text("Description", 14, 70)
        doc.text($('#long-description').text(), -30, 80)
        doc.save('a4.pdf')
   })

   $('#login-button').click((e) => {
        if (!$('#email').val()) {
            $('#error-email').text("Email cannot empty")
        }

        if (!$('#password').val()) {
            $('#error-password').text("Password cannot empty")
        }

        if ($('#email').val() && $('#password').val()) {
            window.location.href = "./index.html"
        }
   })
});