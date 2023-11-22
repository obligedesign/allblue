const ua = {
  browser() {
    const userAgent = window.navigator.userAgent.toLowerCase()
    let ua = ''
    if (userAgent.indexOf('opera') !== -1) {
      ua = 'opera'
    } else if (userAgent.indexOf('edge') !== -1) {
      ua = 'edge'
    } else if (userAgent.indexOf('msie') !== -1 || userAgent.indexOf('trident') !== -1) {
      ua = 'ie'
    } else if (userAgent.indexOf('chrome') !== -1) {
      ua = 'chrome'
    } else if (userAgent.indexOf('safari') !== -1) {
      ua = 'safari'
    } else if (userAgent.indexOf('firefox') !== -1) {
      ua = 'firefox'
    } else if (userAgent.indexOf('gecko') !== -1) {
      ua = 'gecko'
    }
    return ua
  },
  os() {
    const userAgent = window.navigator.userAgent.toLowerCase()
    let ua = ''
    if (userAgent.indexOf('iphone') !== -1) {
      ua = 'iphone'
    } else if (userAgent.indexOf('ipad') !== -1) {
      ua = 'ipad'
    } else if (userAgent.indexOf('android') !== -1) {
      ua = 'android'
    } else if (userAgent.indexOf('windows') !== -1) {
      ua = 'win'
    } else if (userAgent.indexOf('macintosh') !== -1) {
      ua = 'mac'
    }
    return ua
  },
}
export { ua }
