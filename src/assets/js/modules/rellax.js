import 'rellax'

const rellaxAnimation = () => {
  const rellaxElems = document.querySelectorAll('.rellax')

  if (rellaxElems && rellaxElems.length > 0) {
    const Rellax = require('rellax')
    let rellax = new Rellax('.rellax', {
      speed: -6,
      center: false,
      wrapper: null,
      round: true,
      vertical: true,
      horizontal: false,
    })
  }
}

export { rellaxAnimation }
