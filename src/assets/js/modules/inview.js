import inView from 'in-view'

const inviewAnimation = () => {
  inView('.inview').on('enter', (el) => {
    el.classList.add('is-view')
  })
  inView.offset(100)
}

export { inviewAnimation }
