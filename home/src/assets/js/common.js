export default {
  goTop() {
    $('#app').animate({
      scrollTop: 0
    }, 500)
  },

  smBar() {
    let oBarList = $('.sm-bar-list'),
      barH = oBarList.children().length * oBarList.children(':first').height();
    $('.sm-sidebar').on('mouseover', () => {
      oBarList.css({
        'height': barH,
        'transition': 'all 0.5s ease-out 0s'
      })
    }).on('mouseout', () => {
      oBarList.css({
        'height': '4',
        'transition': 'all 0.5s ease-out 0s'
      })
    })
  },
}
