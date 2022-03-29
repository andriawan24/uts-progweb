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
});