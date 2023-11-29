const scrollAddClass = () => {
  const pageTopAnime = () => {
    const body = document.querySelector('body')
    const scroll = window.scrollY || document.documentElement.scrollTop
    let screenHeight
    if (document.querySelector('.page-index')) {
      screenHeight = window.innerHeight
    } else {
      screenHeight = 300
    }

    if (scroll >= screenHeight) {
      body.classList.add('is-scrolled')
    } else {
      body.classList.remove('is-scrolled')
    }
  }

  window.addEventListener('scroll', pageTopAnime)
}

export { scrollAddClass }
