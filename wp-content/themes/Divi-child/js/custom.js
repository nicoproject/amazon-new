jQuery(document).ready(function ($) {
  $('.mobile_menu__bar').click(() => {
    $('.mobile_menu__bar').toggleClass('opened')
    $('.mobile_menu').slideToggle()
  })

  $('#et-info-phone, .callme__button').click(() => {
    $('.callme__wrapper').fadeIn()
  })

  $('.callme__form__close_button').click(() => {
    $('.callme__wrapper').fadeOut()
  })

  $('.mobile_menu__search_icon').click(() => {
    $('.mobile_menu__search_wrapper').slideToggle()
  })

  $(window).resize(function () {
    $('.mobile_menu').css('height', $(window).height())
    $('.callme__button').css(
      'top',
      $(window).height() - $('.callme__button').height() - 20
    )
  })
})


