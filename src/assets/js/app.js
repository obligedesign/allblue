import { ua } from './modules/ua'
import { drawerMenuToggle, drawerMenuClick } from './modules/drawer-menu'
import { rellaxAnimation } from './modules/rellax'
import { inviewAnimation } from './modules/inview'
import { scrollAddClass } from './modules/scrollAddClass'
import smoothScroll from 'smoothscroll-polyfill'

const klass = {
  active: 'is-active',
  fixed: 'is-fixed',
  view: 'is-view',
  selected: 'is-selected',
  hidden: 'is-hidden',
  eventNone: 'is-eventNone',
  landscape: 'is-landscape',
  current: 'is-current',
  large: 'is-large',
  nav: 'view-nav',
}

class App {
  constructor() {
    this.body = document.querySelector('body')
    this.init()
  }

  init() {
    this.initPages()
  }

  initPages() {
    // 全ページ共通適用
    this.body.classList.add(`is-${ua.browser()}`)
    this.body.classList.add(`is-${ua.os()}`)
    // this.setFillHeight()
    // this.setViewMode()

    // ナビゲーション開閉
    drawerMenuToggle()
    drawerMenuClick()

    // invie
    inviewAnimation()

    //rellax
    rellaxAnimation()

    scrollAddClass()
  }
}

document.addEventListener('DOMContentLoaded', () => {
  window.dmrt = new App()

  smoothScroll.polyfill()
  Array.from(document.querySelectorAll('.js-smooth-scroll')).forEach((link) => {
    link.addEventListener('click', (e) => {
      const ankerTarget = e.target
      e.preventDefault()

      document.querySelector('body').classList.remove('view-nav')

      const targetId = ankerTarget.hash

      if (!document.querySelector(targetId)) {
        return false
      }

      const targetElement = document.querySelector(targetId)
      const rectTop = targetElement.getBoundingClientRect().top
      const offsetTop = window.pageYOffset
      const buffer = document.querySelector('.top-nav').clientHeight - 20
      const top = rectTop + offsetTop - buffer
      window.scrollTo({
        top,
        behavior: 'smooth',
      })
    })
  })
})

window.addEventListener('load', () => {
  document.querySelector('.loader').classList.add(klass.hidden)
})
