import React from 'react'
import { App } from '@inertiajs/inertia-react'
import { render } from 'react-dom'
import { InertiaProgress } from '@inertiajs/progress'

const el = document.getElementById('app')

InertiaProgress.init()

render(
  <App
    initialPage={JSON.parse(el.dataset.page)}
    resolveComponent={name => import(`./Pages/${name}`).then(module => module.default)}
  />,
  el
)
