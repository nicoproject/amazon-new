jQuery(document).ready(function ($) {
  $('.mobile_menu__bar').click(() => {
    $('.mobile_menu__bar').toggleClass('opened')
    $('.mobile_menu').slideToggle()
  })

  $('#et-info-phone, .callme__button, .callme_viewform').click(() => {
    event.preventDefault()
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
      $(window).height() - $('.callme__button').height() - 20,
    )
  })

  /**
   * Yandex Metrika goals scored at forms submission
   */
  $('.callorder_form form').submit(function (event) {
    ym(6431896, 'reachGoal', 'CALL_ORDER')
    console.log('CALL_ORDER GOAL')
  })

  $('.et_pb_contact_form')
    .not('.callorder_form .et_pb_contact_form')
    .submit(function (event) {
      ym(6431896, 'reachGoal', 'CONTACT_FORM')
      console.log('CONTACT_FORM GOAL')
    })
    
    $('form.cart').submit(function (event) {
      ym(6431896, 'reachGoal', 'PRODUCT_ADDED')
      console.log('PRODUCT_ADDED GOAL')
    })
    
    $('.social_link_vk').click(function () {
      ym(6431896, 'reachGoal', 'PEREHOD_VK')
      console.log('PEREHOD_VK GOAL')
  })
})
