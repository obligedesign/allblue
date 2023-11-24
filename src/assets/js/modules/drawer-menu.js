const drawerMenuToggle = () => {
  const drawerMenuButton = document.querySelectorAll('[data-drawer-toggle-button]')
  drawerMenuButton.forEach((button) => {
    button.addEventListener('click', () => {
      document.querySelector('body').classList.toggle('view-nav')
    })
  })
}

const drawerMenuClick = () => {
  const drawerMenuItem = document.querySelectorAll('[data-drawer-meue] ul li a')
  drawerMenuItem.forEach((button) => {
    button.addEventListener('click', () => {
      document.querySelector('body').classList.remove('view-nav')
    })
  })
}

export { drawerMenuToggle, drawerMenuClick }
