jQuery(document).ready(function ($) {
  $('.mobile_menu__bar').click(() => {
    $('.mobile_menu__bar').toggleClass('opened')
    $('.mobile_menu').slideToggle()
  })

  $('#et-info-phone').click(() => {
    $('.callme__wrapper').fadeIn()
  })

  $('.mobile_menu__search_icon').click(() => {
    $('.mobile_menu__search_wrapper').slideToggle()
  })

  $('.mobile_menu').css('height', $(window).height())

  $(window).resize(function () {
    $('.mobile_menu').css('height', $(window).height())
  })
})
