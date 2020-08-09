export default ({ app, store }) => {
  app.i18n.beforeLanguageSwitch = (oldLocale, newLocale) => {
    app.store.dispatch('home/setHome', newLocale)
  }
}
