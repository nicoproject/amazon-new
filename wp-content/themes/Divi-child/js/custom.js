console.log('Js integrated')

jQuery(document).ready(function ($) {
  $('.mobile_menu_bar').click(() => {
    $('.mobile_menu').slideToggle()
  })
})
