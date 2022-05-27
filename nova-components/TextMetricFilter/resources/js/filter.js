import Filter from './components/Filter'

Nova.booting((app, store) => {
  app.component('text-metric-filter', Filter)
})
